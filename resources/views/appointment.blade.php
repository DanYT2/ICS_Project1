@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h4 class="text-center">Doctor Information</h4>
            {{--TODO: Profile photo--}}
            <img src="{{ asset('images/profile_photos') }}/{{ $user->profile_photo_path }}" alt="Doctor Image" width="100px" style="border-radius: 50%">
            <br>
            <hr>
            <p class="lead">Name: {{ucfirst($user->name) }}</p>
            <p class="lead">Degree: {{ $user->education }}</p>
            <p class="lead">Expertise: {{ $user->department }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <form action="" method="post">
          @csrf
          <div class="card">
            <div class="card-header lead">{{ $date }}</div>
            <div class="card-body">
              <div class="row">
                @foreach($times as $time)
                <div class="col-md-3">
                  <label for="" class="btn btn-outline-primary justify-center">
                    <input type="radio" name="status" value="1">
                    <span>{{ $time->time }}</span>
                  </label>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="card-footer">
            @if(Auth::check())
              <button type="submit" class="btn btn-success" style="width: 100%">Book Appointment</button>
            @else
              <p>Login to make an appointment</p>
              <button class="btn btn-primary"><a href="/register">Register</a></button>
              bu<a href="{{ route('login') }}">Login</a>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection