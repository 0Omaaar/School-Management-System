<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    public function create_student();
    public function store_student($request);
    public function Get_classrooms($id);
    public function Get_sections($id);


}



?>