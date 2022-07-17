<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  /*TODO: Fixing dashboard routes. Video number 47*/
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index ()
  {
    if (Auth::user()->role == 3)
    {
      return view('home');
    }
    return view('dashboards');
  }
}
