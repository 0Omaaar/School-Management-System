<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\FeesInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{

    protected $invoices;

    public function __construct(FeesInvoicesRepositoryInterface $invoices){
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
        //
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
