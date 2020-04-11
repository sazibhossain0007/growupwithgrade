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

Auth::routes(['register' => false]);

Route::get('/login/guardian', 'Auth\LoginController@showGuardianLoginForm')->name('login.guardian');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm')->name('login.student');
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('login.teacher');

Route::post('/login/guardian', 'Auth\LoginController@guardianLogin');
Route::post('/login/student', 'Auth\LoginController@studentLogin');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware("auth")->group(function(){

});
Route::prefix('/student')->name('student.')->namespace('Student')->middleware("auth:student")->group(function(){
	Route::get('dashboard', function () {
	    return view('student.index');
	})->name("dashboard");
	Route::get('/coursedetails', function () {
	    return view('student.coursedetails');
	});
	Route::get('/studentblog', function () {
	    return view('student.studentblog');
	});

	Route::get('/library', function () {
	    return view('student.library');
	});

    Route::get('/forum', "PostController@index");
    Route::post('/forum/addNew', "PostController@store");

});

//Route::prefix('/teacher')->name('teach.')->namespace('Teacher')->middleware("auth:teacher")->group(function(){
Route::prefix('/teacher')->name('teach.')->middleware("auth:teacher")->group(function(){

	Route::get('dashboard', "Teacher\DashboardController@index")->name("dashboard");
	Route::get('/coursedetails/{id}', "DashboardController@courseDetails") ->name('Teacher\coursedetails');

	Route::resource('/coursedetails/{course}/topic', "Teacher\TopicController");
	Route::resource('/coursedetails/{course}/{topic}/assessment', "Teacher\AssessmentController");
	Route::resource('/coursedetails/{course}/{topic}/matarial', "Teacher\TopicMatarialController");

	Route::resource('/coursedetails/{course}/{topic}/matarial', "Teacher\TopicMatarialController");
	Route::resource('/library', "Teacher\LibraryController");


    Route::get('/profile/{id}', "Teacher\DashboardController@showProfile");
    Route::post('/profile/{id}', "Teacher\DashboardController@updateProfile");

    Route::get('/forum', "PostController@index");
    Route::post('/forum/addNew', "PostController@store");
    Route::post('/comment/addNew', "PostController@storeComment");

	// Route::get('/coursedetails/{course}/addtopic', function () {
	//     return view('teacher.addtopic');
	// }) ->name('addtopic');

	// Route::get('/coursestudent', function () {
	//     return view('teacher.coursestudent');
	// }) ->name('coursestudent');

	// Route::get('/coursedetails/{course}/topic/{topic}', function () {
	//     return view('teacher.topic');
	// });

	// Route::get('/topicdetails', function () {
	//     return view('teacher.topicdetails');
	// }) ->name('topicdetails');

	// Route::get('/addfile', function () {
	//     return view('teacher.addfile');
	// }) ->name('addfile');

	// Route::get('/assessment', function () {
	//     return view('teacher.assessment');
	// }) ->name('assessment');
});

Route::prefix('/guardian')->name('guardian.')->namespace('Guardian')->middleware("auth:guardian")->group(function(){
	Route::get('dashboard', function () {
	    return view('guardian.blank');
	})->name("dashboard");

});

Route::middleware("auth")->prefix('/admin')->group(function(){
	Route::resource('student', 'StudentController');
	Route::resource('teacher', 'TeacherController');
	Route::resource('guardian', 'GuardianController');
	Route::resource('course', 'CourseController');
});
