<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Specialisation;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }

    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();
        return view('pages.Teachers.Teachers', compact('teachers'));
    }

    public function create()
    {
        return $this->teacher->createTeacher();
    }

    public function store(Request $request)
    {
        return $this->teacher->storeTeachers($request);
    }

    public function edit($id)
    {
        return $this->teacher->editTeacher($id);
    }

    public function update(Request $request, $id)
    {
        return $this->teacher->updateTeacher($request, $id);
    }
}