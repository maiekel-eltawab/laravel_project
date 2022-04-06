@extends('layouts.app')

@section('content')
<div class="card mb-3" style="max-width: (90%;)">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('asset/images/users/'.Auth::user()->img)}}"  class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-7 offset-md-1">
      <div class="card-body">
        <h5 class="card-title h1">My Profile <a style="float:right;" class="btn btn-danger" href="{{route('deleteaccount')}}">Delete Account</a></h5>
        <p class="card-text h4"> Name:{{Auth::user()->name}} <a class="mx-2" href="{{route('editename')}}"><i class="mx-2 fa-solid fa-pen-to-square"></i></a></p>
        <p class="card-text h4"><small class="text-muted">Role:{{Auth::user()->role}}</small></p>
        <p class="card-text h4"><small class="text-muted">Email:{{Auth::user()->email}}</small></p>

      </div>
    </div>
  </div>
</div>
@endsection