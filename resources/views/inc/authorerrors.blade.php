
@if($errors->any())
 @foreach($errors->all() as $error)
    <div class="alert alert-danger my-4">
       {{$error}}
    </div> 
 @endforeach
@endif