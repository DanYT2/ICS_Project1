<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Time;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function index (  )
  {
    $doctors = Appointment::where('date', date('Y-m-d'))->get();
    return view('home', compact('doctors'));
  }

  public function show ( $doctorID, $date )
  {
    $appointment = Appointment::where('user_id', $doctorID)->where('date', $date)->first();
    $times = Time::where('appointment_id', $appointment->id)
                 ->where('status', 0)
                 ->get();

    return view('appointment', compact('times', 'date'));
  }
}
