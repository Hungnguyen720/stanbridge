<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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


//===========================================
// URL: '/'
// METHOD: GET
// FUNCTION: RETURN ATTENDANCE VIEW
// NAME: 'home'
//===========================================
Route::get('/', function (Request $request) {

    $url = route('api.students');

    return view('attendance')->with('apiRoute', $url);
})->name('home');


//===========================================
// URL: '/'
// METHOD: GET
// FUNCTION: GETS AND RETURNS ALL STUDENTS
// NAME: 'api.students'
//===========================================

Route::get('/api/students', function(){

    $students = DB::table('students')->get();
    return $students;

})->name('api.students');

//===========================================
// URL: '/'
// METHOD: POST
// FUNCTION: UPDATES STUDENT ATTENDANCE
// NAME: 'api.students'
//===========================================
Route::post('/api/students', function(Request $request){

    $attendanceData = $request->all();
    unset($attendanceData["_token"]);
    $attendanceData = array_filter($attendanceData);

    foreach($attendanceData as $studentId => $attendance){

       DB::table('students')
        ->where('id', $studentId)
        ->update(['attendance' => $attendance]);

    }

    return redirect(route('home'));

})->name('api.students');
