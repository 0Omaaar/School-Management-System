<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalitiev2;
use App\Models\Section;
use App\Models\Specialisation;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TypeBlood;
use Exception;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface
{
    public function Get_students(){
        $students = Student::all();

        return view('pages.Students.index', compact('students'));
    }
    public function create_student()
    {
        $data['grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitiev2::all();
        $data['bloods'] = TypeBlood::all();

        return view('pages.Students.index', $data);
    }

    public function edit_student($id)
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitiev2::all();
        $data['bloods'] = TypeBlood::all();
        $Students =  Student::findOrFail($id);
        return view('pages.Students.edit',$data,compact('Students'));
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

    public function store_student($request)
    {
        try {
            $students = new Student();
            $students->name = $request->name;
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->date_birth = $request->date_birth;
            $students->grade_id = $request->grade_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success('success');
            return redirect()->route('Students.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}


?>