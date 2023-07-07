<?php

namespace App\Repository;
use App\Models\Grade;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        $Grades = Grade::all();

        return view('pages.Students.promotion.index', compact('Grades'));
    }

    public function store($request)
    {

    }
}




?>