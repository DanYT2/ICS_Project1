<?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use Illuminate\Contracts\Foundation\Application;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Http\Request;
  use Illuminate\Http\Response;

  class DoctorController extends Controller
  {
    /*TODO: Image upload not functional*/
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index ()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create ()
    {
      return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store ( Request $request )
    {
//      dd($request->all());
      $this->validateStore($request);
      $data = $request->all();
      $profile_photo_path = $request->file('profile_photo_path');
      $name = $profile_photo_path->hashName();
      $destination = public_path('/images/profile_photos');
      $profile_photo_path->store($destination, $name);

      $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'description' => $request->description,
        'education' => $request->education,
        'gender' => $request->gender,
        'address' => $request->address,
        'role_id' => $request->role_id,
        'profile_photo_path' => $request->file('profile_photo_path')->store('profile_photographs'),
        'department' => $request->department,
        'password' => bcrypt($request->password)
      ];

      User::create($data);
      return redirect()->back()->with('message', 'Doctor added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show ( $id )
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit ( $id )
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update ( Request $request, $id )
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy ( $id )
    {
      //
    }

    public function validateStore (Request $request )
    {
      return $this->validate($request, [
        'name'               => 'required',
        'email'              => 'required|unique:users',
        'password'           => 'required|min:8',
        'gender'             => 'required',
        'education'          => 'required',
        'address'            => 'required',
        'department'         => 'required',
        'phone_number'       => 'required|numeric',
        'profile_photo_path' => 'required|mimes:jpeg,png,jpg',
        'role_id'            => 'required',
        'description'        => 'required',
      ]);
    }
  }
