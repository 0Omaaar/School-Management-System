<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeesRequest;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{

    protected $fees;

    public function __construct(FeesRepositoryInterface $fees){
        $this->fees = $fees;
    }


    public function index()
    {
        return $this->fees->index();
    }

  
    public function create()
    {
        return $this->fees->create();
    }


    public function store(FeesRequest $request)
    {
        return $this->fees->store($request);
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