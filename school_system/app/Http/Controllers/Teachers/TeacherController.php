<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
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
        return $this->teacher->getAllTeachers();
    }
}