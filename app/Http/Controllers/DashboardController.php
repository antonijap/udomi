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
    // return $ad;
    return view('dashboard.edit')->with('ad', $ad);
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

    $ad = Ad::update([
      'name' => request('name'),
      'description' => request('description'),
      'sex' => request('sex'),
      'age' => request('age'),
      'location' => request('location'),
      'user_id' => auth()->id(),
      'type' => request('type'),
      'slug' => $slug,
      'castration' => $castration,
      'sterilization' => $sterilization,
      'invalidity' => $invalidity
    ]);

    foreach ($request->photos as $photo) {

      $img = Image::make($photo)->resize(800, null, function ($constraint) {
        $constraint->aspectRatio();
      });

      $filename = str_random(10) . Carbon::now()->timestamp . '.jpeg';
      $path = 'images/' . $filename;
      $img->save($path, 60);

      AdPhotos::update([
        'ad_id' => $ad->id,
        'filename' => $filename
      ]);
    }

    return redirect('/dashboard');
  }
}
