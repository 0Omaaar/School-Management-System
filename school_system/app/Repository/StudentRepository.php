<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitiev2;
use App\Models\Section;
use App\Models\Specialisation;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TypeBlood;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Storage;


class StudentRepository implements StudentRepositoryInterface
{
    public function Get_students(){
        $students = Student::all();
        return view('pages.Students.index', compact('students'));
    }

    public function show_student($id){
        $Student = Student::findOrFail($id);
        
        return view('pages.Students.show', compact('Student'));
    }
    public function create_student()
    {
        $data['grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitiev2::all();
        $data['bloods'] = TypeBlood::all();

        return view('pages.Students.add', $data);
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
        DB::beginTransaction();
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

            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file){
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(), 'upload_attachments');

                    $images = new Image();
                    $images->filename = $name;
                    $images->imageable_id = $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }

            DB::commit();

            // toastr()->success('success');
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_student($request, $id){
        try {
            $students = Student::findOrFail($id);
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
            // toastr()->success('success');
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function upload_attachments($request){
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new Image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        // toastr()->success('success');
        return redirect()->route('Students.show',$request->student_id);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request){
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        Image::where('id',$request->id)->where('filename',$request->filename)->delete();
        // toastr()->success('Delete');
        return redirect()->route('Students.show',$request->student_id);
    }

    public function delete_student($id){
        try {
            $student = Student::findOrFail($id);
            $student->forceDelete();
            // toastr()->success('Deleted');
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function soft($id, $request){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('Graduated.index');
    }

}


?>