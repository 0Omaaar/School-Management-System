<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizzController extends Controller
{

    public function index()
    {
        $quizzes = Quizze::where('teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.index', compact('quizzes'));
    }


    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.create', $data);
    }


    public function store(Request $request)
    {
        try {
            $quizzes = new Quizze();
            $quizzes->name = $request->name;
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->grade_id;
            $quizzes->classroom_id = $request->classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.edit', $data, compact('quizz'));
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");
        return $list_classes;
    }

    public function Get_sections($id)
    {
        $list_sections = Section::where("classroom_id", $id)->pluck("name_section", "id");
        return $list_sections;
    }
}