<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $student;

    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    public function Get_classrooms($id){
        return $this->student->Get_classrooms($id);
    }
    public function Get_sections($id){
        return $this->student->Get_sections($id);
    }

    public function index()
    {
        return $this->student->Get_students();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->student->create_student();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        return $this->student->store_student($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->student->show_student($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->student->edit_student($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentsRequest $request, $id)
    {
        return $this->student->update_student($request, $id);
    }

    public function upload_attachments(Request $request){
        return $this->student->upload_attachments($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->student->delete_student($id);
    }
}