<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
// use App\Services\Mobile\MobileService;
use App\Services\MobileService;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    protected $mobileService;

    public function __construct(MobileService $mobileService)
    {
        $this->mobileService = $mobileService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobiles = $this->mobileService->index();
        return view('dashboard.mobile.index',compact('mobiles'));
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
    public function store(Request $request)
    {
        //
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
     public function destroy($id)
    {
    }
}
