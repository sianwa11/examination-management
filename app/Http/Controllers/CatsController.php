<?php

namespace App\Http\Controllers;

use App\Models\Cats;
use App\Models\Grades;
use Illuminate\Http\Request;

class CatsController extends Controller
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
        $data = $request->validate([
            'cat_1' => 'integer',
            'cat_2' => 'integer',
            'attendance' => 'integer',
        ]);
        // If class_id & user_id don't exist in grades table insert
        $grade = Grades::firstOrCreate([
            'class_id' =>$request['class_id'],
            'user_id' => $request['user_id'],
        ]);

        if(empty($grade)) return 'Show error';

        $data['grades_id'] = $grade->id;

        Cats::firstOrCreate($data);

        return 'Created successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cats  $cats
     * @return \Illuminate\Http\Response
     */
    public function show(Cats $cats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cats  $cats
     * @return \Illuminate\Http\Response
     */
    public function edit(Cats $cats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cats  $cats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cats $cats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cats  $cats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cats $cats)
    {
        //
    }
}
