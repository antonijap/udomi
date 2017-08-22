<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Ad;
use App\AdPhotos;
use App\User;
use Image;
use Carbon\Carbon;



class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show(Ad $ad)
  {

    return view('dashboard.edit')->with('ad', $ad);
  }

  public function update(Ad $ad, Request $request)
  {

    return $request->photos;
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

    // if ($request->photos->count() > 0) {
    //   foreach ($request->photos as $photo) {
    //
    //     $img = Image::make($photo)->resize(800, null, function ($constraint) {
    //       $constraint->aspectRatio();
    //     });
    //
    //     $filename = str_random(10) . Carbon::now()->timestamp . '.jpeg';
    //     $path = 'images/' . $filename;
    //     $img->save($path, 60);
    //
    //     AdPhotos::find($photo['id'])->update([
    //       'ad_id' => $ad->id,
    //       'filename' => $filename
    //     ]);
    //   }
    // }

    foreach ($request->photos as $photo) {

      $img = Image::make($photo)->resize(800, null, function ($constraint) {
        $constraint->aspectRatio();
      });

      $filename = str_random(10) . Carbon::now()->timestamp . '.jpeg';
      $path = 'images/' . $filename;
      $img->save($path, 60);

      AdPhotos::find($photo['id'])->update([
        'ad_id' => $ad->id,
        'filename' => $filename
      ]);
    }

    // initialize FileUploader
    $FileUploader = new FileUploader('files', array(
      'uploadDir' => '/public/images/',
      'title' => 'name'
    ));

    // call to upload the files
    $data = $FileUploader->upload();

    // if uploaded and success
    if($data['isSuccess'] && count($data['files']) > 0) {
      // get uploaded files
      $uploadedFiles = $data['files'];
    }
    // if warnings
    if($data['hasWarnings']) {
      // get warnings
      $warnings = $data['warnings'];

      echo '<pre>';
      print_r($warnings);
      echo '</pre>';
      exit;
    }

    // unlink the files
    // !important only for appended files
    // you will need to give the array with appendend files in 'files' option of the FileUploader
    foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
      unlink('/public/images/' . $value['name']);
    }

    // get the fileList
    $fileList = $FileUploader->getFileList();


    return redirect('/dashboard');
  }
}
