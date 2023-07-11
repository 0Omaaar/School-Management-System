<?php

namespace App\Repository;

interface FeesInvoicesRepositoryInterface{
    public function index();

    public function show($id);

    public function store($request);
}

