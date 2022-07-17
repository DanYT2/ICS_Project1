<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function index (  )
  {
    $doctors = Appointment::where('date', date('Y-m-d'))->get();
    return view('home', compact('doctors'));
  }
}
