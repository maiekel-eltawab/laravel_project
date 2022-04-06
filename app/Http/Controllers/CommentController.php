<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
class CommentController extends Controller
{
    //
    public function addcomment($id,Request $request)
    {
            
    $validator=\Validator::make($request->all(),
    [
       'body'=>'required|min:3',
        
    ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Comment::create(['body'=>$request->body,'course_id'=>$id,
        'user_id'=>Auth::user()->id ]);
          return back(); 

    }
}
