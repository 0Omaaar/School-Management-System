<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{

    public function index()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('pages.parents.children.index', compact('students'));
    }

    public function results($id)
    {

        $student = Student::findorFail($id);

        if ($student->parent_id !== auth()->user()->id) {
            return redirect()->route('sons.index');
        }
        $degrees = Degree::where('student_id', $id)->get();

        if ($degrees->isEmpty()) {
            return redirect()->route('sons.index');
        }

        return view('pages.parents.degrees.index', compact('degrees'));

    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}