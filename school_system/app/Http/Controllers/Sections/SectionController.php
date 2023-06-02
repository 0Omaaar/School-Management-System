<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $list_grades = Grade::all();

        return view('pages.Sections.Sections', compact('list_grades', 'grades'));
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
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
    public function store(StoreSections $request)
    {
        try {
            $validated = $request->validated();

            $section = new Section();

            $section->name_section = $validated['name_section'];
            $section->status = 1;
            $section->grade_id = $validated['grade_id'];
            $section->classroom_id = $validated['classroom_id'];

            $section->save();

            toastr()->success('Section added successfully !');

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
    public function update(StoreSections $request, string $id)
    {
        try {
            $validated = $request->validated();
            $section = Section::findOrFail($id);
            if (isset($request->status)) {
                $status = 1;
            } else {
                $status = 0;
            }
            $section->update([
                $section->name_section = $validated['name_section'],
                $section->grade_id = $validated['grade_id'],
                $section->classroom_id = $validated['classroom_id'],
                $section->status = $status,
            ]);
            toastr()->success("Section Updated !");
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
        $section = Section::findOrFail($id)->delete();

        toastr()->success("Section deleted !");
        return redirect()->back();
    }
}