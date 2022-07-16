@extends('admin.layouts.master')

@section('content')
  <div class="page-header">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="page-header-title">
          @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
              {{ Session::get('$message') }}
            </div>
          @endif
          <i class="ik ik-edit bg-blue"></i>
          <div class="d-inline">
            <h5>Doctors</h5>
            <span>Doctors present in the system</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.html"><i class="ik ik-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#">Doctor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <div class="card-body">
            <form action="{{ route('doctor.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
              @csrf
              <h3 class="p-4 justify-content-center">Add Doctor</h3>
              <div class="row">
                <div class="col-lg-6 mt-3">
                  <label for="Name">Full name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name of Doctor" value="{{ old('name') }}">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-lg-6 mt-3">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 mt-3">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Insert password" value="{{ old('password') }}>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-lg-6 mt-3">
                  <label for="email">Gender</label>
                  <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 mt-3">
                  <label for="education">Level of education</label>
                  <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="Highest degree" value="{{ old('education') }}>
                  @error('education')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-lg-6 mt-3">
                  <label for="address">Address</label>
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{ old('address') }}>
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="">Department</label>
                    <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}>
                    @error('department')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="">Phone number</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}>
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group mt-3">
                  <label class="ml-10">Image</label>
                  <input type="file" name="profile_photo_path" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="file" class="form-control file-upload-info @error('profile_photo_path') is-invalid @enderror" placeholder="Upload Image"
                           name="profile_photo_path">
                    <span class="input-group-append">
                                                    {{--<button class="file-upload-browse btn btn-primary" type="button">Select Photo</button>--}}
                                                    </span>
                    @error('profile_photo_path')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="role">Role</label>
                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" value="{{ old('role') }}>

                      @foreach(App\Models\Role::get() as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach

                    </select>
                    @error('role_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleTextarea1">About</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="4" name="description" value="{{ old('description') }}></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection