<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('logged')->group(function(){

    Route::get('/logout','UserController@logout')->name('logout');
    Route::get('/create','TeacherController@create')->name('createCourse');
    Route::post('/store','TeacherController@store')->name('storeCourse');
    Route::get('/enroll/{id}','StudentController@enroll')->name('enroll');
    Route::get('/myenroll','StudentController@myenroll')->name('myenroll');
    Route::get('/unenroll/{id}','StudentController@unenroll')->name('unenroll');
    Route::get('/deletecourse/{id}','TeacherController@deletecourse')->name('deletecourse');
    Route::get('/editecourse/{id}','TeacherController@editecourse')->name('editecourse');
    Route::post('/updatecourse/{id}','TeacherController@updatedcourse')->name('updatedcourse');
    Route::get('view/course/{id}','StudentController@viewcourse')->name('viewcourse');
    Route::post('add/comment/{id}','CommentController@addcomment')->name('addcomment');
    Route::get('/myprofile','HomeController@myprofile')->name('myprofile');
    Route::get('/delete/account','UserController@deleteaccount')->name('deleteaccount');
    Route::get('edite/myname','UserController@editename')->name('editename');
    Route::post('update/myname','UserController@updatename')->name('updatename');
    Route::get('/myhome','HomeController@myhome')->name('myhome');
});


Route::get('/register','UserController@register')->name('register');
Route::post('/register','UserController@handleregister')->name('handleregister');

Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@handlelogin')->name('handlelogin');
