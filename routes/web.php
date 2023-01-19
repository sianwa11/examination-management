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

/* TEACHER */
Route::get('/teach', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teach');

/* CLASS */
Route::resource('class', \App\Http\Controllers\ClassController::class);

/* STUDENT */
Route::resource('student', \App\Http\Controllers\StudentController::class);

/* CLASS STUDENTS */
Route::resource('class-students', \App\Http\Controllers\ClassStudentsController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'student'])->name('dashboard');

require __DIR__.'/auth.php';