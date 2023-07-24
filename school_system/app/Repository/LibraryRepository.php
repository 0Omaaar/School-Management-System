<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Library;

class LibraryRepository implements LibraryRepositoryInterface
{
    public function index()
    {
        $books = Library::all();
        return view('pages.library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.library.create', compact('grades'));
    }

    public function store($request)
    {

    }

    public function edit($id)
    {

    }

    public function update($request)
    {

    }

    public function destroy($request)
    {

    }

    public function download($filename)
    {

    }
}