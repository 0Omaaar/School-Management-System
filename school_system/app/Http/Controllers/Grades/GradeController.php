<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();

        return view('pages.Grades.Grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrades $request)
    {
        try {
            $validated = $request->validated();

            $grade = new Grade();

            $grade->name = $validated['name'];
            $grade->notes = $request->notes;

            $grade->save();

            toastr()->success('Grade added successfully !');

            return redirect()->route('Grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGrades $request, $id)
    {
        try {
            $validated = $request->validated();
            $grade = Grade::findOrFail($id);
            $grade->update([
                $grade->name = $validated['name'],
                $grade->notes = $request->notes,
            ]);
            toastr()->success("Grade Updated !");
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $grade = Grade::findOrFail($id);

            if($grade->classrooms->count() != 0){
                toastr()->error("This Grade had already some classerooms, Please delete them first !");
                return redirect()->back();
            }
            else{
                $grade->delete();
                toastr()->success("Grade Deleted !");
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}