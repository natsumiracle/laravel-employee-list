@extends('layouts.app')

@section('title', 'Explore People')

@section('content')
<h1 class="text-center">Laravel Employee List</h1>
     <div class="row justify-content-center">
     

        <table class="table  table-hover align-middle bg-white border text-secondary">
      <thead class="small table-success text-secondary">
        <tr class="text-center">
          <th></th>
          <th class="text-start">NAME</th>
          <th>DEPARTMENT</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

        @forelse ($users as $user)
            <tr>
              <td>@if ($user->avatar)
                  <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle d-block mx-auto avatar-md">
                @else
                   <i class="fa-solid fa-circle-user d-block  text-center icon-md text-secondary"></i>
                @endif
              </td>
              <td>
                <a href="#" class="text-decoration-none text-dark fw-bold">
                  {{ $user->name }}
                </a>
              </td>
              <td class="text-center">{{$user->department}}</td>
              
              <td class="text-center">
                <span class="d-inline-block">
                @if (Auth::user()->id !== $user->id)
                   <button  class="btn btn-primary btn-sm px-3 " data-bs-toggle="modal" data-bs-target="#detail-user-{{ $user->id }}">
                        Details
                   </button>
                   @include('users.modal.detail')
                @else
                <a href="{{ route('edit',$user->id) }}" class="btn btn-secondary btn-sm "><i class="fa-solid fa-pen"></i></a>
                <form action="{{ route('destroy',$user->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm "><i class="fa-solid fa-trash-can"></i></button>
                    <!-- <a href="{{ route('destroy',$user->id) }}" class="btn btn-danger btn-sm m-1"><i class="fa-solid fa-trash-can"></i></a> -->
                    
                  
                    <!-- Include the modal here -->
                    </form>
                  @endif      
              
                
               </span>  
              </td>
             
            </tr>
            @empty
            <tr>
              <td colspan="6">
                <p class="lead text-muted text-center">
                 No result found.
                </p>
              </td>
            </tr>
         
        @endforelse
        </tbody>
     
  </table>
  <div class="d-flex justify-content-center">
     {{ $users->links() }}
  </div>
      
     </div>
@endsection