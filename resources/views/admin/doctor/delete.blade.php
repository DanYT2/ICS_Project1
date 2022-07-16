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
        <div class="card-header"><h3>Confirm Delete</h3></div>
          <div class="card-body">
            <h2>{{ $user->name }}</h2>
            <form action="{{ route('doctor.destroy', [$user->id]) }}" class="forms-sample" method="post" enctype="multipart/form-data">
              @method('DELETE')
              @csrf
              <div class="card-footer">
                <button type="submit" class="btn btn-danger mr-2">Confirm</button>
                <a href="{{ route('doctor.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>

      </div>
    </div>
  </div>
@endsection