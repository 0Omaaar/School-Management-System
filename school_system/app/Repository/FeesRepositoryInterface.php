<?php

namespace App\Repository;

interface FeesRepositoryInterface
{
    public function index();
    public function create();
    public function edit($id);
    public function update($request, $id);
    public function store($request);
    public function destroy($request);
}