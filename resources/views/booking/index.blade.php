@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">My Appointments <div class="badge">{{ $appointments->count() }}</div></div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
              </tr>
              </thead>
              <tbody>
              @forelse($appointments as $key=>$appointment)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $appointment->doctor->name }}</td>
                  <td>{{ $appointment->time }}</td>
                  <td>{{ $appointment->date }}</td>
                  <td>{{ $appointment->created_at }}</td>
                  <td>
                    @if($appointment->status == 0)
                      <button class="btn btn-primary">Not visited</button>
                    @else
                      <button class="btn btn-success">Appointment attended</button>
                    @endif
                  </td>
                </tr>
              @empty
                <td>You have no appointments.</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection