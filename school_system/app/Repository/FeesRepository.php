<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Grade;

class FeesRepository implements FeesRepositoryInterface
{
    public function index()
    {
        $fees = Fee::all();
        $Grades = Grade::all();
        return view('pages.Fees.index', compact('fees', 'Grades'));
    }

    public function create()
    {
        $Grades = Grade::all();

        return view('pages.Fees.add', compact('Grades'));
    }

    public function store($request)
    {
        try {

            $fees = new Fee();
            $fees->title = $request->title;
            $fees->amount = $request->amount;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->Fee_type = $request->Fee_type;
            $fees->save();
            toastr()->success('success');
            return redirect()->route('Fees.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}