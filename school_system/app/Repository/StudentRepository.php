<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalitiev2;
use App\Models\Specialisation;
use App\Models\Teacher;
use App\Models\TypeBlood;
use Exception;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface
{
public function create_student(){
    $data['grades'] = Grade::all();
    $data['parents'] = MyParent::all();
    $data['genders'] = Gender::all();
    $data['nationalities'] = Nationalitiev2::all();
    $data['bloods'] = TypeBlood::all();

    return view('pages.Students.add', $data);
}

}


?>