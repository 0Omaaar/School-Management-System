<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    public function getAllTeachers();
    public function createTeacher();
    public function storeTeachers($request);
    public function editTeacher($id);
    public function updateTeacher($request, $id);
    public function deleteTeacher($id);

}



?>