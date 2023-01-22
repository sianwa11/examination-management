<?php

namespace App\Http\Controllers;

use App\Models\Cats;
use App\Models\FinalGrade;
use App\Models\Grades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FinalGradeController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'finals' => 'required|integer'
        ]);


        // If class_id & user_id don't exist in grades table insert
        $grade = Grades::firstOrCreate([
            'class_id' => $request['class_id'],
            'user_id' => $request['user_id'],
        ]);

        $cats = Cats::where('grades_id', $grade->id)->get()[0] ?? false;

        if (empty($grade) || empty($cats)) return 'Show error';

        $data['grades_id'] = $grade->id;

        $final = FinalGrade::where('grades_id', $grade->id)->first();

        if (empty($final)) {
            FinalGrade::Create($data);
            $grades = Grades::where('id', $grade->id)->with('cats', 'final_grades')->get()[0];
            $this->calculateFinalGrade($grades);
        } else {
            return 'Already created';
        }


        return redirect('/class/'.$grade->class_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FinalGrade $finalGrade
     * @return \Illuminate\Http\Response
     */
    public function show(FinalGrade $finalGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FinalGrade $finalGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(FinalGrade $finalGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FinalGrade $finalGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinalGrade $finalGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FinalGrade $finalGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinalGrade $finalGrade)
    {
        //
    }

    private function calculateFinalGrade($grades)
    {
        $grade_id = $grades->id;
        $cat1 = $grades->cats->cat_1 ?? 0;
        $cat2 = $grades->cats->cat_2 ?? 0;
        $final = $grades->final_grades->finals ?? 0;

        $total = $cat1 + $cat2 + $final;
        $percentage = round(($total / 180) * 100, 2);

        Grades::where('id', $grade_id)->update(['total_grade' => $total, 'percentage' => $percentage]);
    }
}
