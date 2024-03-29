<?php

  namespace App\Http\Controllers;

  use App\Models\Appointment;
  use App\Models\Time;
  use Illuminate\Contracts\Foundation\Application;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;

  class AppointmentController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index ()
    {
      $myAppointments = Appointment::latest()->where('user_id', \auth()->user()->id)->get();
      return view('admin.appointment.index', compact('myAppointments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store ( Request $request )
    {
      $this->validate($request, [
        'date' => 'required|unique:appointments,date,NULL,id,user_id,' . Auth::id(),
        'time' => 'required',
      ]);
      $appointment = Appointment::create([
        'user_id' => auth()->user()->id,
        'date'    => $request->date
      ]);

      foreach ( $request->time as $time ) {
        Time::create([
          'appointment_id' => $appointment->id,
          'time'           => $time,
          //          'status'
        ]);
      }

      return redirect()->back()->with('message', 'Appointment successfully created on' . $request->date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create ()
    {
      return view('admin.appointment.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show ( $id )
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ( $id )
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update ( Request $request, $id )
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ( $id )
    {
      //
    }

    public function check ( Request $request )
    {
      $date = $request->date;
      $appointment = Appointment::where('date', $date)->where('user_id', \auth()->user()->id)->first();

      if ( !$appointment ) {
        return redirect()->to('/appointment')->with('errmessage', 'Appointment time not available for this date');
      }
      $appointmentID = $appointment->id;
      $times = Time::where('appointment_id', $appointmentID)->get();
//      return $times;
      return view('admin.appointment.index', compact('times', 'appointmentID', 'date'));
    }

    public function updateTime ( Request $request )
    {
      $appointmentID = $request->appointmentID;
      $appointment = Time::where('appointment_id', $appointmentID)->delete();
      foreach ( $request->time as $time )
      {
        Time::create([
          'appointment_id' => $appointmentID,
          'time'           => $time,
          'status'         => 0
        ]);
      }

      return redirect()->route('appointment.index')->with('message', 'Appointment time updated successfully');
    }
  }
