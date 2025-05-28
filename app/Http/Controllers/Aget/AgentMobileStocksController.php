<?php

namespace App\Http\Controllers\Aget;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\AgentMobileStockRequest;
use App\Models\Mobile;
use App\Services\Agent\AgentMobileStockService;
use Illuminate\Http\Request;

class AgentMobileStocksController extends Controller
{
    protected $mobilsStockService ; 

    public function __construct(AgentMobileStockService $mobilsStockService)
    {
        $this->mobilsStockService = $mobilsStockService ; 
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobiles = $this->mobilsStockService->getAllMyProducts();
        return view('dashboard-agent.my-devices.my-inventory',compact('mobiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentMobileStockRequest $request )
    {
        $this->mobilsStockService->saveInMyProducts($request->validated());
        return to_route('agent.select-devices')->with('success','A mobile add to your stock successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
