<!-- Deactivate -->
<div class="modal fade" id="detail-user-{{ $user->id }}">
  <div class="modal-dialog">
   <div class="modal-content border-primary">
    <div class="modal-header border-primary">
      <h5 class="modal-title text-primary">
        <i class="fa-solid fa-user"></i> User Details
      </h5>
    </div>
      <div class="modal-body">
        @if ($user->avatar)
          <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle d-block mx-auto avatar-lg">
        @else
            <i class="fa-solid fa-circle-user d-block  text-center icon-lg text-secondary mb-3"></i>
        @endif
        <div class="text-start">
          <p>Employee ID: {{ $user->id }}</p>
          <p>Employee Name: {{ $user->name }}</p>
          <p>Employee Department: {{ $user->department }}</p>
          <p>Employee Salary: {{ $user->salary }}</p>
          <p>Employee Email: {{ $user->email }}</p>
          <p>Joined Date: {{ date('M /d/ Y', strtotime($user->created_at)) }}</p>
        </div>   
        
         
      </div>
      <div class="modal-footer border-0">
        
          <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">
               Cancel
          </button>  
      
    </div>
   </div>
  </div>
</div>
