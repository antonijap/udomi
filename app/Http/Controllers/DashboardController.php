<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

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
}
