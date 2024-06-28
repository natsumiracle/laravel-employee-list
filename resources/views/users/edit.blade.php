@extends('layouts.app')

@section('title', 'Edit')

@section('content')
 <h1>Edit Employee</h1>
 <form action="{{ route('update',$user->id) }}" method="post" enctype="multipart/form-data">
   @csrf
   @method('PATCH')
   <div class="row">
      <div class="col">
            @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle d-block mx-auto avatar-lg">
            @else
                  <i class="fa-solid fa-circle-user d-block  text-center icon-lg text-secondary"></i>
            @endif

      </div>
      <div class="col my-auto">
            <input type="file" name="avatar" id="avatar" class="ms-auto  text-secondary form-control">
            @error('avatar')
             <div class="text-danger small">{{ $message }}</div>
            @enderror
            <p class="text-secondary m-0">Acceptable formtas: jpeg.jpg.png.gif only.</p>
             <p class="text-secondary mb-3">Maximun file size is 1048kb.</p> 
      </div>
   </div>

      <label for="name" class="text-secondary mb-2">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$user->name) }}">
      @error('name')
           <div class="text-danger small">{{ $message }}</div>
       @enderror

      <label for="department" class="text-secondary my-2">Department</label>
      <input type="text" name="department" id="department" class="form-control" value="{{ old('department',$user->department) }}">
      @error('department')
            <div class="text-danger small">{{ $message }}</div>
      @enderror
      <label for="salary" class="text-secondary my-2">Salary</label>
      <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary',$user->salary) }}" step=".01">
      @error('salary')
            <div class="text-danger small">{{ $message }}</div>
      @enderror
      <label for="email" class="text-secondary my-2">Email</label>
      <input type="text" name="email" id="email" class="form-control mb-3" value="{{ old('email',$user->email) }}">
      @error('email')
            <div class="text-danger small">{{ $message }}</div>
      @enderror

      <a href="{{ route('index') }}" class="btn btn-success ">Back</a>
      <button type="submit" class="btn btn-warning  m-1">Save</button>
      
 </form>
  
  




@endsection
