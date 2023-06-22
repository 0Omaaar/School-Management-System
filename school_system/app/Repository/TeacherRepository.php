<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialisation;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;


class TeacherRepository implements TeacherRepositoryInterface
{

    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function createTeacher()
    {
        $specialisations = Specialisation::all();
        $genders = Gender::all();

        return view('pages.Teachers.create', compact('specialisations', 'genders'));
    }

    public function storeTeachers($request)
    {
        try {
            $teachers = new Teacher();
            $teachers->email = $request->email;
            $teachers->password = Hash::make($request->password);
            $teachers->name = $request->name;
            $teachers->specialisation_id = $request->specialisation_id;
            $teachers->gender_id = $request->gender_id;
            $teachers->joining_date = $request->joining_date;
            $teachers->address = $request->address;
            $teachers->save();
            toastr()->success('Success');
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $specialisations = Specialisation::all();
        $genders = Gender::all();

        return view('pages.Teachers.edit', compact('specialisations', 'genders', 'teacher'));
    }

    public function updateTeacher($request, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $teacher->name = $request->name;
            $teacher->specialisation_id = $request->specialisation_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success('Update');
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}


?>