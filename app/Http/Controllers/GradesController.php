<?php

namespace App\Http\Controllers;

use App\Models\Cats;
use App\Models\Classes;
use App\Models\FinalGrade;
use App\Models\Grades;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $class_id = \request()->query('id');
        $students = User::whereHas('class_students', function (Builder $query) {
            $query->where('class_id', 'like', \request()->query('id'));
        })->get();

        $exams_marks = Grades::where('class_id', $class_id)->with('cats', 'final_grades')->get();
        $avg_grade = round(Grades::where('class_id', $class_id)->avg('percentage'),2);

        return view('grades.create', compact('students', 'class_id',
            'exams_marks', 'avg_grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Grades $grades
     * @return \Illuminate\Http\Response
     */
    public function show(Grades $grades)
    {
    }

    public function showStudent()
    {
        $id = auth()->user()->id;
        $my_grades = Grades::where('user_id', $id)->with('cats','final_grades')->get();
        $avg_grade = round(Grades::where('user_id',$id)->avg('percentage'), 2);

        return view('my_grades', compact('my_grades', 'avg_grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Grades $grades
     * @return \Illuminate\Http\Response
     */
    public function edit(Grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Grades $grades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grades $grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Grades $grades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grades $grades)
    {
        //
    }

    /**
     * Show forms for grading a particular student
     * @return void
     */
    public function grade_student($student_id, $class_id)
    {
        $student = User::find($student_id);
        $class = Classes::find($class_id);

        return view('grades.grade_students', compact('student', 'class'));
    }
}
