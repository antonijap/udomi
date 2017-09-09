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
use Illuminate\Pagination\Paginator;
use OpenGraph;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'filter']);
    }

    public function index()
    {
        $ads = Ad::orderBy('updated_at', 'desc')->where('is_adopted', 0)->simplePaginate(30);

        $og = new OpenGraph();
        $og->title('Udomi.net')
            ->type('website')
            ->image('/images/facebook.jpg')
            ->description('Udomi.net je oglasnik za udomljavanje životinja. Posebno napravljen za udruge.')
            ->url('http://udomi.net');

        return view('index')->with('ads', $ads)->with('og', $og);
    }

    public function new()
    {
        return view('new');
    }

    public function create(UploadRequest $request)
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

        // Create username
        $name = request('name');
        $slug = str_replace(' ', '-', strtolower($name));

        $this->validate(request(), [
            'name' => 'required|min:2',
            'description' => 'required|min:32|max:1000',
            'sex' => 'required',
            'age' => 'required',
            'location' => 'required',
            'type' => 'required',
            'photos' => 'required'
        ]);

        $ad = Ad::create([
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
            'invalidity' => $invalidity,
            'is_adopted' => false
        ]);

        // $images = public_path() . '/images/';
        // $userDir = $images . $ad->user->username . '/';
        $path = storage_path('/app/public/' . $ad->user->username . '/');

        if (file_exists($path)) {
            // initialize FileUploader
            $FileUploader = new FileUploader('files', array(
              'uploadDir' => $path,
              'title' => 'name'
            ));
        } else {
            File::makeDirectory($path, 0777, true);
            // $path = public_path() . '/images/' . $ad->user->username . '/';
            // initialize FileUploader
            $FileUploader = new FileUploader('files', array(
              'uploadDir' => $path,
              'title' => 'name'
            ));
        }


        // call to upload the files
        $data = $FileUploader->upload();

        // if uploaded and success
        if($data['isSuccess'] && count($data['files']) > 0) {

          $uploadedFiles = $data['files'];
        //   return $uploadedFiles;
          foreach ($uploadedFiles as $photo) {
              AdPhotos::create([
                  'ad_id' => $ad->id,
                  'filename' => 'storage/' . $ad->user->username . '/' . $photo['name'],
                  'name' => $photo['title'],
                  'size' => $photo['size'],
                  'type' => $photo['type']
              ]);
          }

        }
        session()->flash('message', 'Oglas uspješno objavljen.');
        return redirect('/dashboard');

    }

    public function filter(Request $request)
    {
        $sex = request('sex');
        $age = request('age');
        $location = request('location');
        $type = request('type');

        $dropdownData = [
            'type' => request('type'),
            'sex' => request('sex'),
            'age' => request('age'),
            'location' => request('location')
        ];

        $ads = Ad::orderBy('updated_at', 'desc')->where('is_adopted', 0);

        if ($sex == 'all') {
            $sex = ['female', 'male'];
        }

        if ($age == 'all') {
            $age = ['junior', 'adult'];
        }

        if ($type == 'all') {
            $type = ['cat', 'dog'];
        }

        if ($location == 'all') {
            $location = [
                'bjelovarsko-bilogorska',
                'brodsko-posavska',
                'dubrovacko-neretvanska',
                'grad-zagreb',
                'istarska',
                'karlovacka',
                'koprivnicko-krizevacka',
                'krapinsko-zagorska',
                'licko-senjska',
                'medimurska',
                'osjecko-baranjska',
                'pozesko-slavonska',
                'primorsko-goranska',
                'sisasko-moslavcka',
                'splitsko-dalmatinska',
                'sibensko-kninska',
                'varazdinska',
                'viroviticko-podravska',
                'vukovarsko-srijemska',
                'zadarska',
                'zagrebacka'
            ];
        }

        $results = $ads->whereIn('sex', (array) $sex)->whereIn('age', (array) $age)->whereIn('location', (array) $location)->whereIn('type', (array) $type)->simplePaginate(30);

        return view('results')->with('ads', $results)->with('data', $dropdownData);

    }

    public function show($username, $slug)
    {
        $user = User::where('username', $username)->first();
        $ad = $user->ads->where('slug', '=', $slug)->first();

        // Parse location
        $locationArray = explode("-", $ad->location);
        $locationFinal = [];
        if (count($locationArray) > 0) {
            foreach ($locationArray as $location) {
                $locationFinal[] = ucfirst($location);
            }
        }

        $url = 'http://udomi.net/' . $ad->user->username . '/' . $ad->slug;

        $og = new OpenGraph();
        $og->title($ad->name . ' | ' . 'Udomi.net')
            ->type('website')
            ->image('/' . $ad->photos->first()->filename)
            ->description($ad->description)
            ->url($url);

        return view('ad')->with('ad', $ad)->with('location', $locationFinal)->with('og', $og);
    }

}
