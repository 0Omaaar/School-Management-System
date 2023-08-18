<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // Get Classrooms
    public function getClassrooms($id)
    {
        return Classroom::where("grade_id", $id)->pluck("name_class", "id");

    }

    //Get Sections
    public function Get_Sections($id){

        return Section::where("classroom_id", $id)->pluck("name_section", "id");

    }
}
