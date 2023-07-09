<?php

namespace App\Repository;
use App\Models\Grade;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface{
    public function index(){
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index',compact('students'));
    }

    public function create(){
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create', compact('Grades'));
    }

    public function softDelete($request){
        $students = Student::where('grade_id',$request->grade_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', 'There is no student !');
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id', $ids)->Delete();
        }

        toastr()->success('Success');
        return redirect()->route('Graduated.index');
    }
}


?>