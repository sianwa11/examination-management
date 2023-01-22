<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassStudents;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'teacher']);
    }

    public function index()
    {
        $teacher_id = auth()->user()->id;
        $class_stats = User::where('id',$teacher_id)->with('my_classes')->get()[0];
        $class_students = Classes::where('created_by', $teacher_id)->with('class_students')->get();
        $no_of_students = 0;
        foreach ($class_students as $student) {
            $no_of_students += count($student->class_students);
        }

        return view('teacher.index', compact('class_stats', 'no_of_students'));
    }
}
