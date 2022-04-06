@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('myhome')}}" class="btn btn-info">My Home</a>
</div>
<div class="row">

@foreach(Auth::user()->enrollments as $enroll)
@foreach($courses as $course)
  @if($course->id==$enroll->course_id)
  <div class="col-md-4">
      <img width="90%" height="300px" src="https://img.freepik.com/free-vector/laravel-development-flat-illustration-editable-vector-design_203633-1148.jpg?w=740" class="card-img-top" alt="...">
        <h5 class="card-title">{{$course->name}}</h5>
        <p class="card-text">{{$course->desc}}</p>
        <p>{{$course->duration}}<p>
        <a href="{{route('unenroll',$enroll->id)}}" class="btn btn-success ">unenroll</a>
        
        </div>  @endif
@endforeach
@endforeach
</div>
@endsection
