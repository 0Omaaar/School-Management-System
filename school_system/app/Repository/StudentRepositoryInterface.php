<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    public function Get_students();
    public function create_student();
    public function store_student($request);
    public function update_student($request, $id);
    public function edit_student($id);
    public function delete_student($id);
    public function Get_classrooms($id);
    public function Get_sections($id);


}



?>