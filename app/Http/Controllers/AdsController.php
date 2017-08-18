<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show', 'filter']);
    }

    public function index()
    {
        $ads = Ad::all();
        return view('index')->with('ads', $ads);
    }

    public function new()
    {
        return view('new');
    }

    public function create(Request $request)
    {

        $path = $request->file('file')->store('/public/thumbnails');
        return $path;

        $this->validate(request(), [
            'name' => 'required|min:2',
            'description' => 'required|min:20|max:140',
            'sex' => 'required',
            'age' => 'required',
            'location' => 'required'
        ]);

        Ad::create([
            'name' => request('name'),
            'description' => request('description'),
            'sex' => request('sex'),
            'age' => request('age'),
            'location' => request('location'),
            'user_id' => auth()->id()
        ]);

        return redirect('/dashboard');
    }

    public function filter(Request $request)
    {
        $sex = request('sex');
        $age = request('age');
        $location = request('location');

        $dropdownData = [request('sex'), request('age'), request('location')];

        $ads = Ad::all();

        if ($sex == 'all') {
            $sex = ['female', 'male'];
        }

        if ($age == 'all') {
            $age = ['junior', 'adult'];
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

        $results = $ads->whereIn('sex', (array) $sex)->whereIn('age', (array) $age)->whereIn('location', (array) $location);

        // return $results;
        return view('results')->with('ads', $results)->with('data', $dropdownData);

    }

    public function show(Ad $ad)
    {
        // return $ad;
        return view('ad')->with('ad', $ad);
    }
}
