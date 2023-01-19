<?php

namespace App\Http\Controllers;

use App\Models\ClassStudents;
use Illuminate\Http\Request;

class ClassStudentsController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->student_id as $id) {
            ClassStudents::create([
                'user_id' => $id,
                'class_id' => $request->class_id,
            ]);
        }

        return redirect('class/'.$request->class_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassStudents  $classStudents
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudents $classStudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassStudents  $classStudents
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassStudents $classStudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassStudents  $classStudents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassStudents $classStudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassStudents  $classStudents
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassStudents $classStudents)
    {
        //
    }
}
