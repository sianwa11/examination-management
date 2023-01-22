<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'student']);
    }


    public function index()
    {
        $id = auth()->user()->id;

        $student = User::find($id);
        $my_classes = User::where('id', $id)->with('class_students')->get()[0]->class_students;

        return view('dashboard', compact('student', 'my_classes'));
    }
}
