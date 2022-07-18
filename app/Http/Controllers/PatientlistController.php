<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PatientlistController extends Controller
{
  public function index (Request $request)
  {
    $bookings = Booking::latest()->where('date', date('Y-m-d'))->get();
    if ($request->date)
    {
      $bookings = Booking::latest()->where('date', $request->date)->get();
    }
    return view('admin.patientlist.index', compact('bookings'));
  }
}
