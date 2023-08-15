<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Question;
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
        $questions = Question::where('quizze_id', $id)->get();
        $quizz = Quizze::findorFail($id);
        return view('pages.Teachers.dashboard.Questions.index', compact('questions', 'quizz'));
    }


    public function edit(string $id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.edit', $data, compact('quizz'));
    }


    public function update(Request $request)
    {
        try {
            $quizz = Quizze::findorFail($request->id);
            $quizz->name = $request->name;
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->grade_id;
            $quizz->classroom_id = $request->classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = auth()->user()->id;
            $quizz->save();

            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            Quizze::destroy($id);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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