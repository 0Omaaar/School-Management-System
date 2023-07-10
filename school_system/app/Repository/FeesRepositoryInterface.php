<?php

namespace App\Repository;

interface FeesRepositoryInterface {
    public function index();
    public function create();
    public function store($request);
}