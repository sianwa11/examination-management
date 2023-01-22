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

/* Grades */
Route::get('grade_student/{student_id}/{class_id}', [\App\Http\Controllers\GradesController::class, 'grade_student'])->name('grade_student');
Route::get('my-grades', [\App\Http\Controllers\GradesController::class, 'showStudent'])->name('my_grades');
Route::resource('grades', \App\Http\Controllers\GradesController::class);

/* Cats */
Route::resource('cats', \App\Http\Controllers\CatsController::class);

/* Finals */
Route::resource('finals', \App\Http\Controllers\FinalGradeController::class);

/* Student Dashboard */
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'student'])->name('dashboard');

require __DIR__.'/auth.php';
