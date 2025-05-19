<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileDescriptionRequest;
use App\Models\Mobile;
use App\Models\MobileDescription;
use App\Services\Mobile\MobileDescriptionService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MobileDescriptionController extends Controller
{
    protected $mobileDescriptionService;

    public function __construct(MobileDescriptionService $mobileDescriptionService)
    {
        $this->mobileDescriptionService = $mobileDescriptionService;
    }

    /**
     * Display a listing of the mobile specification.
     */
    public function description($id)
    {
        try {
            $data = $this->mobileDescriptionService->description($id);
            $description = $data['description'];
            $mobile = $data['mobile'];
            return view('dashboard.mobile.display.mobile_description', compact('description','mobile'));
        } catch (ModelNotFoundException $e) {
            try{
                $mobile = $this->mobileDescriptionService->add_description($id);
                return view('dashboard.mobile.display.mobile_description', compact('mobile'));
            }catch (ModelNotFoundException $e) {
                abort(404, $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('Error showing mobile description: ' . $e->getMessage());
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_description($id)
    {
        try{
            $mobile = $this->mobileDescriptionService->create_description($id);
            return view('dashboard.mobile.create.createDescription',compact('mobile'));
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing mobile description: ' . $e->getMessage());
            abort(500);
        }
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileDescriptionRequest $request)
    {
        $mobile = $this->mobileDescriptionService->store($request);

        return redirect()->route('mobiles.index')->with('success','The mobile description was successfully added.');
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
    public function edit($id)
    {
        $description = MobileDescription::findOrFail($id);
        return view('dashboard.mobile.update.updateDescription', compact('description'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileDescriptionRequest $request, $id)
    {
        $this->mobileDescriptionService->update($request, $id);       
        return redirect()->route('mobiles.index')->with('success','Mobile description updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}       //
