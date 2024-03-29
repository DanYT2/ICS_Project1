<?php

  namespace App\Http\Controllers;

  use App\Models\Booking;
  use App\Models\Prescription;
  use Illuminate\Http\Request;

  class PrescriptionController extends Controller
  {
    public function index ()
    {
      $bookings = Booking::where('date', date('Y-m-d'))
                         ->where('status', 1)
                         ->where('doctor_id', auth()->user()->id)
                         ->get();
      return view('prescription.index', compact('bookings'));
    }

    public function store ( Request $request )
    {
      $data = $request->all();
      Prescription::create($data);

      return redirect()->back()->with('message', 'Prescription created');
    }

    public function show ($userID, $date)
    {
      $prescription = Prescription::where('user_id', $userID)->where('date', $date)->first();
      return view('prescription.show', compact('prescription'));
    }

    /*Get all patients from prescription table*/
    public function patientsFromPrescription ()
    {
      $patients = Prescription::get();
      return view('prescription.all', compact('patients'));
    }
  }
