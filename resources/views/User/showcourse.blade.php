@extends('layouts.app')
@section('content')


<div class="card my-4">
  <div class="card-header">
    <span class="card-title h1">{{$course->name}}</span>

    </div>

   <div class="card-body"> 
     <div class="row">

       <div class="col-md-4">
       <img width="100%" height="200px" src="https://img.freepik.com/free-vector/laravel-development-flat-illustration-editable-vector-design_203633-1148.jpg?w=740" class="card-img-top" alt="...">

       </div>
       <div class="col-md-7 offset-md-1">
       <p class="card-title"><b>Desc:</b>{{$course->desc}}</p>
       <p class="card-text"><b>Duration:-</b>{{$course->duration}}</p>
      <p class="card-text"><b>Created At:-</b>{{$course->created_at}}</p>
      <p class="card-text"><b>Author:-</b>{{$course->user->name}}</p>
    
      </div>


     </div>
   
  </div>
</div>

<form class="my-4" action="{{route('addcomment',$course->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    
    <img src="{{asset('asset/images/users/'.Auth::user()->img)}}"  class="rounded-circle mx-3" width="50px" height="50px" alt="...">

     <span>{{Auth::user()->name}}</span>

<div class="form-floating">
  <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Comments</label>
</div>
<button type="submit" class="btn btn-info">add comment</button>
</form>

@foreach($course->comments as $comment)
<div class="alert alert-success">
    @foreach($users as $user)
       @if($user->id == $comment->user_id)
       <img src="{{asset('asset/images/users/'.$user->img)}}"  class="rounded-circle mx-3" width="50px" height="50px" alt="...">

        <span>{{$user->name}}</span>
        
        <span class="mx-2 ">{{$comment->body}}</span>
      @endif
   @endforeach
</div>
@endforeach

@endsection