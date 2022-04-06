<div class="d-flex justify-content-end">
<a href="{{route('createCourse')}}" class="btn btn-info">Add New Course</a>
</div>

@foreach(Auth::user()->courses as $course)
 

 <div class="card my-4">
  <div class="card-header">
    <span class="card-title h1">{{$course->name}}</span>
      <a href="{{route('deletecourse',$course->id)}}" style="float:right;" class="btn btn-danger">
      <i class="fa-solid fa-trash-can"></i></a>
      <a href="{{route('editecourse',$course->id)}}" style="float:right;" class="btn btn-success mx-2">
      <i class="fa-solid fa-pen-to-square"></i></a>

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
      </div>
    
     </div>
  </div>
</div>
@endforeach
