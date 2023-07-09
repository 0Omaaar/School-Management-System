<?php

namespace App\Repository;

interface StudentRepositoryInterface
{

    public function Get_students();
    public function show_student($id);
    public function create_student();
    public function store_student($request);
    public function update_student($request, $id);
    public function upload_attachments($request);
    public function Download_attachment($studentsname, $filename);
    public function Delete_attachment($request);
    public function edit_student($id);
    public function delete_student($id);
    public function Get_classrooms($id);
    public function Get_sections($id);
    public function soft($id, $request);


}



?>