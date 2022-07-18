<?php

  namespace App\Http\Controllers;

  use App\Models\Booking;
  use Illuminate\Http\Request;

  class PrescriptionController extends Controller
  {
    public function index ()
    {
      $bookings = Booking::where('date', date('Y-m-d'))->where('status');
      return view('prescription.index', compact('bookings'));
    }
  }
