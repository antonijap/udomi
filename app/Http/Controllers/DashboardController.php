<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Ad;
use App\AdPhotos;
use App\User;
use Image;
use Carbon\Carbon;
use App\Classes\Fileuploader;
use File;


class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show(Ad $ad)
  {

    $userDir = public_path() . '/images/' . $ad->user->username . '/';

    foreach($ad->photos as $file) {
      $appendedFiles[] = array(
        "name" => $file['name'],
        "type" => $file['type'],
        "size" => $file['size'],
        "file" => '/' . $file['filename'],
        "data" => array(
          "url" => '/' . $file['filename']
        )
      );

    }

    $appendedFiles = json_encode($appendedFiles);
    return view('dashboard.edit')->with('ad', $ad)->with('photos', $appendedFiles);

  }

  public function update(Ad $ad, UploadRequest $request)
  {

    if (request('castration') == '') {
      $castration = 'off';
    } else {
      $castration = 'on';
    }

    if (request('sterilization') == '') {
      $sterilization = 'off';
    } else {
      $sterilization = 'on';
    }

    if (request('invalidity') == '') {
      $invalidity = 'off';
    } else {
      $invalidity = 'on';
    }

    $this->validate(request(), [
      'name' => 'required|min:2',
      'description' => 'required|min:20|max:140',
      'sex' => 'required',
      'age' => 'required',
      'location' => 'required',
      'type' => 'required'
    ]);

    Ad::find($ad['id'])->update([
      'name' => request('name'),
      'description' => request('description'),
      'sex' => request('sex'),
      'age' => request('age'),
      'location' => request('location'),
      'user_id' => auth()->id(),
      'type' => request('type'),
      'castration' => $castration,
      'sterilization' => $sterilization,
      'invalidity' => $invalidity
    ]);

    $images = public_path() . '/images/';
    $path = $images . $ad->user->username . '/';

    $appendedFiles = [];
    foreach ($ad->photos as $photo) {
      $appendedFiles[] = array(
        "name" => $photo['name'],
        "type" => $photo['type'],
        "size" => $photo['size'],
        "file" => $photo['filename'],
        "data" => array(
          "url" => '/' . $photo['filename']
        )
      );
    }

    $FileUploader = new FileUploader('files', array(
      'uploadDir' => $path,
      'title' => 'name',
      'files' => $appendedFiles
    ));
    $upload = $FileUploader->upload();

    // Upload new photos
    if($upload['isSuccess'] && count($upload['files']) > 0) {
      $fileList = $FileUploader->getFileList();
      foreach ($fileList as $photo) {
        // Check if photos exist and avoid them
        $existingPhoto = [];
        $existingPhoto = AdPhotos::where('filename', $photo['file'])->get();
        if ($existingPhoto->isEmpty()) {
           // Upload new photos
          AdPhotos::create([
            'ad_id' => $ad->id,
            'filename' => $photo['file'],
            'name' => $photo['title'],
            'size' => $photo['size'],
            'type' => $photo['type']
          ]);
        }
      }
    }

    if($upload['hasWarnings']) {
      $warnings = $upload['warnings'];
      echo $warnings;
    };

    // Scan for photos
    $photosSurvivedPotentialRemoving = $FileUploader->getListInput('photos');

    $photos = [];
    foreach ($photosSurvivedPotentialRemoving as $photo) {
      $photos[] = AdPhotos::where('filename', substr($photo, 1))->first();
    }

    // Extract removed photos and do model and storage cleanup
    $removedPhotos = $ad->photos->diff(array_filter($photos));

    foreach ($removedPhotos as $key => $value) {
      AdPhotos::where('id', $value['id'])->first()->delete();
      $path = public_path() . '/';
      File::delete($path . $value['filename']);
    }

    return redirect('/dashboard');
  }
}
