@if(count($bookings) > 0)
  {{--MODAL--}}
  {{--TODO: Modal not functional when button is pressed--}}
  <div class="modal fade" id="exampleModal{{ $booking->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="{{ route('prescription') }}" method="post">
        @csrf

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
              <label for="">Prescription</label>
              <textarea name="medicine[]" id="medicine[]" cols="30" rows="10" class="form-control" placeholder="Prescription"></textarea>
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
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endif