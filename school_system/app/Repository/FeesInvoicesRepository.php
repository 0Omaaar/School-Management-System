<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use DB;

class FeesInvoicesRepository implements FeesInvoicesRepositoryInterface
{
    public function index()
    {
        $Fee_invoices = FeeInvoice::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index', compact('Fee_invoices', 'Grades'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('classroom_id', $student->classroom_id)->get();
        return view('pages.Fees_Invoices.add', compact('student', 'fees'));
    }

    public function store($request)
    {

        $List_Fees = $request->List_Fees;

        DB::beginTransaction();

        try {

            foreach ($List_Fees as $List_Fee) {

                $Fees = new FeeInvoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->grade_id = $request->grade_id;
                $Fees->classroom_id = $request->classroom_id;
                ;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();


                $StudentAccount = new StudentAccount();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fees->id;
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }

            DB::commit();

            toastr()->success('success');
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            FeeInvoice::destroy($request->id);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $fee_invoices = FeeInvoice::findorfail($id);
        $fees = Fee::where('classroom_id', $fee_invoices->classroom_id)->get();
        return view('pages.Fees_Invoices.edit', compact('fee_invoices', 'fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $Fees = FeeInvoice::findorfail($request->id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            $StudentAccount = StudentAccount::where('fee_invoice_id', $request->id)->first();
            $StudentAccount->debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();

            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}