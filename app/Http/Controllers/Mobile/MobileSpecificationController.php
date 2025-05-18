<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileSpecificationRequest;
use App\Models\Mobile;
use App\Models\MobileSpecification;
use App\Services\Mobile\MobileSpecificationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MobileSpecificationController extends Controller
{
    protected $mobileSpecificationService;

    public function __construct(MobileSpecificationService $mobileSpecificationService)
    {
        $this->mobileSpecificationService = $mobileSpecificationService;
    }
    public function index() {}
    /**
     * Display a listing of the mobile specification.
     */
    public function specification($id)
    {
        try {
            $data = $this->mobileSpecificationService->specification($id);
            $specification = $data['specification'];
            $mobile = $data['mobile'];
            return view('dashboard.mobile.mobile_specification', compact('specification', 'mobile'));
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing mobile specification: ' . $e->getMessage());
            abort(500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileSpecificationRequest $request)
    {
        $this->mobileSpecificationService->store($request);
        $mobile = Mobile::find($request->mobile_id);
        return view('dashboard.mobile.createDescription', compact('mobile'))->with('success', 'The mobile Specification was successful added.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specification = MobileSpecification::findOrFail($id);
        return view('dashboard.mobile.update.updateSpecification', compact('specification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileSpecificationRequest $request,  $id)
    {
        $this->mobileSpecificationService->update($request, $id);
        return redirect()->route('mobiles.index')->with('success', 'Mobile specification updated ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
