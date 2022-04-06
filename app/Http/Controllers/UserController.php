<?php

namespace App\Http\Controllers;
use App\USer;
use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\Comment;
use App\Enrollment;

class UserController extends Controller
{
    
    public function register()
    {
        return view('User.register');
    }
    public function handleregister(Request $request)
    {
        
        $validator=\Validator::make($request->all(),
        [
           'name'=>'required|max:191|min:3',
            'email'=>'required|email',
            'password'=>'required|min:3',
            'role'=>'required',
            'img'=>'required'
        ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
   
        $image=$request->file('img');
        $imagename=time().$image->getclientOriginalName();
        $img=\Image::make($image->getRealPath());
        $img->resize(350,350);
        $img->save(public_path('asset/images/users/'.$imagename));
        User::create(['name'=>$request->name,'email'=>$request->email,
        'img'=>$imagename,'role'=>$request->role,'password'=>\Hash::make($request->password) ]);

        return redirect(route('login'));

      }
      public function login()
      {
          return view('User.login');
      }
      public function handlelogin(Request $request)
      {
          $validator=\Validator::make($request->all(),
          [
              'email'=>'required|email',
              'password'=>'required|min:3',
          ]);
      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)
              ->withInput();
      }
    $email=$request->email;
    $password=$request->password;
      $cred=array('email'=>$email,'password'=>$password);
          
          if(Auth::attempt($cred))
          return redirect(route('myhome'));

         
              return redirect(route('login'));
  
      }
      public function logout()
      {
          Auth::logout();
          return redirect(route('login'));
  
      }
      public function deleteaccount()
      {
        $id=Auth::user()->id;
       if( Comment::where('user_id',$id)->first()!=null){
        $comments=Comment::where('user_id',$id)->get();
        foreach($comments as $comment)
        {
            $comment->delete();
        }

       }
       if( Course::where('user_id',$id)->first()!=null){
        $courses=Course::where('user_id',$id)->get();
        foreach($courses as $course)
        {
            $course->delete();
        }

       }
        if( Enrollment::where('user_id',$id)->first()!=null){
            $enrollments=Enrollment::where('user_id',$id)->get();
            foreach($enrollments as $enrollment)
            {
                $enrollment->delete();
            }

        }
        User::find($id)->delete();
        return redirect(route('login'));

      }
      public function editename()
      {
        return view('User.editemyname');
      }
      public function updatename(Request $request)
      {
        $validator=\Validator::make($request->all(),
        [
           'name'=>'required|max:191|min:3'
            
        ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        User::find(Auth::user()->id)->update(['name'=>$request->name]);
        return redirect(route('myprofile'));
            


      }

      
}
