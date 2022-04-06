<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
class HomeController extends Controller
{
    //
    function myhome()
    {
        $courses=Course::get();
        return view('User.myhome',['courses'=>$courses]);
    }
    function myprofile()
    {
        return view('User.myprofile');
    }
}
