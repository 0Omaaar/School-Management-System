<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Degree;
use App\Models\FeeInvoice;
use App\Models\MyParent;
use App\Models\ReceiptStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

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

    public function attendances()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('pages.parents.Attendance.index', compact('students'));
    }

    public function attendanceSearch(Request $request)
    {
        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ]);

        // $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        // $students = Student::whereIn('section_id', $ids)->get();

        $students = Student::where('parent_id', auth()->user()->id)->get();

        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('pages.parents.Attendance.index', compact('Students', 'students'));
        } else {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('pages.parents.Attendance.index', compact('Students', 'students'));

        }

    }

    public function fees()
    {
        $students_ids = Student::where('parent_id', auth()->user()->id)->pluck('id');
        $Fee_invoices = FeeInvoice::whereIn('student_id', $students_ids)->get();
        return view('pages.parents.fees.index', compact('Fee_invoices'));
    }

    public function receiptStudent($id)
    {

        $student = Student::findorFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            return redirect()->route('sons.fees');
        }

        $receipt_students = ReceiptStudent::where('student_id', $id)->get();

        if ($receipt_students->isEmpty()) {
            return redirect()->route('sons.fees');
        }
        return view('pages.parents.Receipt.index', compact('receipt_students'));

    }

    public function profile()
    {
        $information = MyParent::findorFail(auth()->user()->id);
        return view('pages.parents.profile', compact('information'));
    }

    public function update(Request $request, $id)
    {

        $information = MyParent::findorFail($id);

        if (!empty($request->password)) {
            $information->name_father = $request->name;
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->name_father = $request->name;
            $information->save();
        }

        return redirect()->back();

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

    public function destroy(string $id)
    {
        //
    }
}