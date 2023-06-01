<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassrooms;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();

        return view('pages.Classrooms.Classrooms', compact('classrooms', 'grades'));
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
    public function store(StoreClassrooms $request)
    {
        $List_Classes = $request->List_Classes;

        try {

            $validated = $request->validated();

            foreach ($List_Classes as $List_Classe) {
                $My_Classes = new Classroom;
                $My_Classes->name_class = $List_Classe['name_class'];
                $My_Classes->grade_id = $List_Classe['grade_id'];
                $My_Classes->save();
            }
            toastr()->success('Class Added !');
            return redirect()->back();
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
    public function update(StoreClassrooms $request, string $id)
    {
        try {
            // $validated = $request->validated();
            $classroom = Classroom::findOrFail($id);
            $classroom->update([
                $classroom->name_class = $request->name_class,
                $classroom->grade_id = $request->grade_id,
            ]);
            toastr()->success("Classroom Updated !");
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $classroom = Classroom::findOrFail($id);
            $classroom->delete();
            toastr()->error("Classroom Deleted !");
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}