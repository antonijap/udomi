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

  public function update(Ad $ad, Request $request)
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


    foreach ($ad->photos as $photo) {
      AdPhotos::where('id', $photo['id'])->first()->delete();
    }

    $path = public_path() . '/images/' . $ad->user->username . '/';

    // initialize FileUploader
    $FileUploader = new FileUploader('files', array(
      'uploadDir' => $path,
      'title' => 'name'
    ));

    // call to upload the files
    $upload = $FileUploader->upload();

    // if uploaded and success
    if($upload['isSuccess'] && count($upload['files']) > 0) {
      foreach ($upload['files'] as $photo) {
        AdPhotos::create([
          'ad_id' => $ad->id,
          'filename' => $photo['file'],
          'name' => $photo['title'],
          'size' => $photo['size'],
          'type' => $photo['type']
        ]);
      }
    }

    if($upload['hasWarnings']) {
      $warnings = $upload['warnings'];
      return $warnings;
    };

    // return$FileUploader->getListInput();
    return $FileUploader->getRemovedFiles();

    // foreach($FileUploader->getRemovedFiles('file') as $key => $value) {
    //   return $value;
    //   AdPhotos::where('filename', $value['file'])->first()->delete();
    // }
    //
    // return redirect('/dashboard');
  }
}
