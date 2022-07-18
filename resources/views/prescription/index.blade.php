@extends('admin.layouts.master')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Appointments <div class="badge">{{ $bookings->count() }}</div></div>

          <div class="card-body">
            <table class="table table-striped">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Time</th>
                <th scope="col">Doctor</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
              @forelse($bookings as $key=>$booking)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $booking->date }}</td>
                  <td>{{ $booking->user->name }}</td>
                  <td>{{ $booking->user->email }}</td>
                  <td>{{ $booking->user->gender }}</td>
                  <td>{{ $booking->time }}</td>
                  <td>{{ $booking->doctor->name }}</td>
                  <td>
                    @if($booking->status == 1)
                      Attended
                    @endif
                  </td>
                     <td>
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Write prescription
                       </button>
                     </td>
                </tr>
                {{--MODAL--}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
                        <input type="hidden" name="doctor_id" value="{{ $booking->doctor->id }}">
                        <input type="hidden" name="date" value="{{ $booking->date }}">

                        <div class="form-group">
                          <label for="">Diagnosis</label>
                          <input type="text" name="name_of_disease" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="">Symptoms</label>
                          <textarea name="symptoms" id="symptoms" cols="30" rows="10" class="form-control" placeholder="List of symptoms"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="">Medicine dosages</label>
                          <textarea name="procedure_to_use_medicine" id="procedure_to_use_medicine" cols="30" rows="10" class="form-control" placeholder="Medicine Dosages"></textarea>

                        </div>
                        <div class="form-group">
                          <label for="">Feedback</label>
                          <textarea name="feedback" id="feedback" cols="30" rows="10" class="form-control" placeholder="Feedback"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="">Signature</label>
                          <input type="text" name="signature" class="form-control" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <td class="col-span-5">No appointments today</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection