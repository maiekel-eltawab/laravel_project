<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use Auth;
use App\Enrollment;
use App\Comment;
class TeacherController extends Controller
{
   public function create()
   {
       return view('Teacher.create');
       
   }
   public function store(Request $request)
   {
        
    $validator=\Validator::make($request->all(),
    [
       'name'=>'required|max:191|min:3',
        'desc'=>'required|string',
        'duration'=>'required',
        
    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Course::create(['name'=>$request->name,'desc'=>$request->desc,
        'duration'=>$request->duration,'user_id'=>Auth::user()->id ]);
     return redirect(route('myhome'));
        
   }
   public function deletecourse($id)
   {
   if( Enrollment::where('course_id',$id)->first()!=null){
    Enrollment::where('course_id',$id)->first()->delete();
   }
   if( Comment::where('course_id',$id)->first()!=null){
    Comment::where('course_id',$id)->first()->delete();
   }
    Course::find($id)->delete();
    return back();
   }
   public function editecourse($id)
   {
       $course=Course::find($id);
       return view('Teacher.edite',['course'=>$course]);
   }
   public function updatedcourse($id,Request $request)
   {
       
    $validator=\Validator::make($request->all(),
    [
       'name'=>'required|max:191|min:3',
        'desc'=>'required|string',
        'duration'=>'required',
        
    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Course::find($id)->update(['name'=>$request->name,'desc'=>$request->desc,
        'duration'=>$request->duration,'user_id'=>Auth::user()->id ]);
     return redirect(route('myhome'));
        
    
   }
}
