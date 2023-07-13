<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\FeesInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{

    protected $invoices;

    public function __construct(FeesInvoicesRepositoryInterface $invoices)
    {
        $this->invoices = $invoices;
    }

    public function index()
    {
        return $this->invoices->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->invoices->store($request);
    }


    public function show(string $id)
    {
        return $this->invoices->show($id);
    }


    public function edit(string $id)
    {
        return $this->invoices->edit($id);
    }


    public function update(Request $request)
    {
        return $this->invoices->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->invoices->destroy($request);
    }
}