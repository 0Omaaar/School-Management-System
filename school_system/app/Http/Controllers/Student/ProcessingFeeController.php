<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{

    protected $processing;

    public function __construct(ProcessingFeeRepositoryInterface $processing)
    {
        $this->processing = $processing;
    }

    public function index()
    {
        return $this->processing->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->processing->store($request);
    }


    public function show(string $id)
    {
        return $this->processing->show($id);
    }


    public function edit(string $id)
    {
        return $this->processing->edit($id);
    }


    public function update(Request $request)
    {
        return $this->processing->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->processing->destroy($request);
    }
}