<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    
    protected $graduated;

    public function __construct(StudentGraduatedRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->index();
    }


    public function create()
    {
        return $this->graduated->create();
    }


    public function store(Request $request)
    {
        return $this->graduated->softDelete($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
