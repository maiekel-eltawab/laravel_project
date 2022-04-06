<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use Auth;
use App\Course;
use App\User;
class StudentController extends Controller
{
    //
    public function enroll($id)
    {
       Enrollment::create(['user_id'=>Auth::user()->id,'course_id'=>$id]); 
       return back();
    }
    public function myenroll()
    {
        $courses=Course::get();
        return view('User.myenroll',['courses'=>$courses]); 
    }
    public function unenroll($id)
    {
        Enrollment::find($id)->delete();
        return back();  
    }
    function viewcourse($id)
    {
        $course=Course::find($id);
        $users=User::get();
        return view('User.showcourse',['course'=>$course,'users'=>$users]);
    }
   

}
