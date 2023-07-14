<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $reciept;

    public function __construct(ReceiptStudentsRepositoryInterface $reciept)
    {
        $this->reciept = $reciept;
    }
    public function index()
    {
        return $this->reciept->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->reciept->store($request);

    }

    public function show(string $id)
    {
        return $this->reciept->show($id);

    }


    public function edit(string $id)
    {
        return $this->reciept->edit($id);

    }


    public function update(Request $request)
    {
        return $this->reciept->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->reciept->destroy($request);
    }
}