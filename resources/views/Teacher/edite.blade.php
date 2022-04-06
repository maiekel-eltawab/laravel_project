@extends('layouts.app')
@section('title')
Create Course
@endsection
@section('content')
<form class="my-4" action="{{route('updatedcourse',$course->id)}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" value="{{$course->name}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Course Description</label>
    <input type="text" name="desc" value="{{$course->desc}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Duration</label>
    <input type="number" name="duration" value="{{$course->duration}}"  class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Update Course</button>
</form>
@endsection