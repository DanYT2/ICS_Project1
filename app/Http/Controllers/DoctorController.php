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
     * @return Application|Factory|View
     */
    public function index ()
    {
      $users = User::get();
      return view('admin.doctor.index', compact('users'));
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
      return redirect()->route('doctor.index')->with('message', 'Doctor added successfully');

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
     * @return Application|Factory|View
     */
    public function edit ( $id )
    {
      $user = User::find($id);
      return view('admin.doctor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update ( Request $request, $id )
    {
      $this->validateUpdate($request, $id);
      $data = $request->all();
      $user = User::find($id);
      $imageName = $user->profile_photo_path;
      $userPassword = $user->password;

      if ($request->hasFile('profile_photo_path'))
      {
        $image = $request->file('profile_photo_path');
        $name = $image->hashName();
        $destination = public_path('/images/profile_photos');
        $image->move($destination, $imageName);
      }
      $data['image'] = $imageName;

      if ($request->password)
      {
        $data['password'] = bcrypt($request->password);
      }
      else
      {
        $data['password'] = $userPassword;
      }
      $user->update($data);
      return redirect()->route('doctor.index')->with('message', 'Doctor Updated successfully');

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
    public function validateUpdate (Request $request, $id )
    {
      return $this->validate($request, [
        'name'               => 'required',
        'email'              => 'required|unique:users,email,'.$id,
        'gender'             => 'required',
        'education'          => 'required',
        'address'            => 'required',
        'department'         => 'required',
        'phone_number'       => 'required|numeric',
        'profile_photo_path' => 'mimes:jpeg,png,jpg',
        'role_id'            => 'required',
        'description'        => 'required',
      ]);
    }
  }
