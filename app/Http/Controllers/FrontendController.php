<?php

  namespace App\Http\Controllers;

  use App\Models\Appointment;
  use App\Models\Booking;
  use App\Models\Time;
  use App\Models\User;
  use Illuminate\Http\Request;

  class FrontendController extends Controller
  {
    /*TODO: Check if multiple appointments can be created within a single day by the same patient*/
    public function index ()
    {
      $doctors = Appointment::where('date', date('Y-m-d'))->get();
      if ( request('date') ) {
        $doctors = $this->findDoctorsBasedOnDate(\request('date'));
        return view('home', compact('doctors'));
      }
      return view('home', compact('doctors'));
    }

    public function findDoctorsBasedOnDate ( $date )
    {
      $doctors = Appointment::where('date', $date)->get();
      return $doctors;
    }

    public function show ( $doctorID, $date )
    {
      $appointment = Appointment::where('user_id', $doctorID)->where('date', $date)->first();
      $times = Time::where('appointment_id', $appointment->id)
                   ->where('status', 0)
                   ->get()
      ;
      $user = User::where('id', $doctorID)->first();
      $doctor_id = $doctorID;

      return view('appointment', compact('times', 'date', 'user', 'doctor_id'));
    }

    public function store ( Request $request )
    {
      $request->validate([
        'time' => 'required'
      ]);
      if ( $this->checkBookingTimeInterval() )
      {
        return redirect()->back()->with('errmessage', 'You already have an appointment for this date. Please select another date');
      }

      Booking::create([
        'user_id'   => auth()->user()->id,
        'doctor_id' => $request->doctorID,
        'time'      => $request->time,
        'status'    => 0,
        'date'      => $request->date,
      ]);

      Time::where('appointment_id', $request->appointmentID)
          ->where('time', $request->time)
          ->update([ 'status' => 1 ]);
      
      return redirect()->back()->with('message', 'Appointment booked successfully');
    }

    public function checkBookingTimeInterval ()
    {
      Booking::orderby('id', 'desc')->where('user_id', auth()->user()->id)
                                    ->whereDate('created_at', date('Y-m-d'))
                                    ->exists();
    }
  }
