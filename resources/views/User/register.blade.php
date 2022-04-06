@extends('layouts.app')

@section('title')
Register
@endsection


@section('content')
@include('inc.authorerrors')
<form class="my-4" action="{{route('handleregister')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <h3>Your Role<h3>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="teacher">
  <label class="form-check-label" for="inlineRadio1">Teacher</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="student">
  <label class="form-check-label" for="inlineRadio2">Student</label>
</div>
<div class="my-3">
  <label for="formFile" class="form-label">Select User Image</label>
  <input name="img" class="form-control" type="file" id="formFile">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
