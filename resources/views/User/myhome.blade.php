@extends('layouts.app')
@section('title')
{{Auth::user()->name}}
@endsection()
@section('content')
@if(Auth::user()->role=='teacher')
@include('inc.teacherhome')
@endif
@if(Auth::user()->role=='student')
@include('inc.studenthome')
@endif

@endsection
