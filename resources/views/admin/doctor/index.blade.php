@extends('admin.layouts.master')

@section('content')
  <div class="page-header">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="page-header-title">
          <i class="ik ik-inbox bg-blue"></i>
          <div class="d-inline">
            <h5>Doctors</h5>
            <span>Doctor information</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.html"><i class="ik ik-home"></i></a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Doctors</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Doctors </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white">
          {{ Session::get('message') }}
        </div>
      @endif
      <div class="card">
        <div class="card-header"><h3>Data Table</h3></div>
        <div class="card-body">
          <table id="data_table" class="table">
            <thead>
            <tr>
              <th>Name</th>
              <th class="nosort">Avatar</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone number</th>
              <th>department</th>
              <th></th>
              <th></th>

            </tr>
            </thead>
            <tbody>
            @if(count($users) > 0)
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  {{--TODO: Ensure images are working--}}
                  <td><img src="{{ asset('../images/profile_photos') }}/{{ $user->profile_photo_path }}" class="table-user-thumb" alt=""></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->address }}<i class="ik ik-eye table-actions " ></i> </td>
                  <th>{{ $user->phone_number }}</th>
                  <th>{{ $user->department }}</th>
                  <td>
                    <div class="table-actions">
{{--                      <a  href="#" data-toggle="modal" data-target="exampleModal{{ $user->id }}"><i class="ik ik-eye" ></i></a>--}}
                      <a href="#" data-toggle="modal" data-target="#exampleModal"><a href="#" data-toggle="modal" data-target="#exampleModal{{ $user->id }}"><i class="ik ik-eye"></i></a></a>
                      <a href="{{ route('doctor.edit', [$user->id]) }}"><i class="ik ik-edit-2"></i></a>
                      <a href="{{ route('doctor.show', [$user->id]) }}"><i class="ik ik-trash-2"></i></a>
                    </div>
                  </td>
                </tr>
                @include('admin.doctor.modal')
              @endforeach
            @else
              <td>No users to display</td>
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection