<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Doctor information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          <p class="badge badge-pill badge-dark">Role: {{ $user->role->name }}</p> <br>
          {{--TODO: Ensure images are functional--}}
          <img src="{{ asset('../images/profile_photos') }}/{{ $user->profile_photo_path }}" alt="{{ $user->name }}'s profile photo" width="200">
          <p>Name: {{ $user->name }}</p>
          <p>Email: {{ $user->email }}</p>
          <p>Address: {{ $user->address }}</p>
          <p>Phone number: {{ $user->phone_number }}</p>
          <p>Department: {{ $user->department }}</p>
          <p>Education level: {{ $user->education }}</p>
          <p>Description: {{ $user->description }}</p>


        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
