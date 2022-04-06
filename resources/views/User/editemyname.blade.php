@extends('layouts.app')

@section('content')
<form class="my-4" action="{{route('updatename')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" value="{{Auth::user()->name}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <button class="btn btn-info" type="submit">Edite MyName</button>
</div>
</form>
@endsection