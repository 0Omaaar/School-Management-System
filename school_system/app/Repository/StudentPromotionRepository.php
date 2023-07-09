<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        $Grades = Grade::all();

        return view('pages.Students.promotion.index', compact('Grades'));
    }

    public function create()
    {
        $promotions = Promotion::all();

        return view('pages.Students.promotion.management', compact('promotions'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {


            $students = Student::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', __('There is no Student !'));
            }

            //  update in table student
            foreach ($students as $student) {

                $ids = explode(',', $student->id);
                Student::whereIn('id', $ids)
                    ->update([
                        'grade_id' => $request->grade_id_new,
                        'classroom_id' => $request->classroom_id_new,
                        'section_id' => $request->section_id_new,
                        'academic_year' => $request->academic_year_new,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->grade_id,
                    'from_classroom' => $request->classroom_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->grade_id_new,
                    'to_classroom' => $request->classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year' => $request->academic_year,
                    'academic_year_new' => $request->academic_year_new,
                ]);

            }
            DB::commit();
            toastr()->success('success');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        DB::beginTransaction();

        try {

            if ($request->page_id == 1) {

                $Promotions = Promotion::all();
                foreach ($Promotions as $Promotion) {

                    $ids = explode(',', $Promotion->student_id);
                    Student::whereIn('id', $ids)
                        ->update([
                            'grade_id' => $Promotion->from_grade,
                            'classroom_id' => $Promotion->from_classroom,
                            'section_id' => $Promotion->from_section,
                            'academic_year' => $Promotion->academic_year,
                        ]);

                    Promotion::truncate();

                }
                DB::commit();
                toastr()->success('Deleted');
                return redirect()->back();

            } else {

                $Promotion = Promotion::findorfail($request->id);
                Student::where('id', $Promotion->student_id)
                    ->update([
                        'grade_id' => $Promotion->from_grade,
                        'classroom_id' => $Promotion->from_classroom,
                        'section_id' => $Promotion->from_section,
                        'academic_year' => $Promotion->academic_year,
                    ]);


                Promotion::destroy($request->id);
                DB::commit();
                toastr()->success('Deleted');
                return redirect()->back();

            }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
}




?>