<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileImageRequest;
use App\Services\Mobile\MobileImageService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MobileImageController extends Controller
{
    protected $mobileImageService;

    public function __construct(MobileImageService $mobileImageService)
    {
        $this->mobileImageService = $mobileImageService;
    }
    /**
     * Display a listing of the mobile specification.
     */
    public function images($id)
    {
        try {
            $data = $this->mobileImageService->images($id);
            $images = $data['images'];
            $mobile = $data['mobile'];
            return view('dashboard.mobile.mobile_images', compact('images','mobile'));
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing mobile images: ' . $e->getMessage());
            abort(500);
        }
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
    public function store(MobileImageRequest $request)
    {
        $data = $this->mobileImageService->store($request);
        return redirect()->back()->with('success','The image was successful added.');
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
        try {
            $image = $this->mobileImageService->destroy($id);
            return redirect()->back()->with('success','The image was successful deleted.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete image due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete image due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting image: ' . $e->getMessage());
            abort(500);
        }
    }
     
    public function make_image_unEssential($id){
         $this->mobileImageService->make_image_unEssential($id);
        return redirect()->back()->with('success','the image is  un essential.'); 
    }

    public function make_image_essential($id,$mobileId){
         $this->mobileImageService->make_image_essential($id,$mobileId);
        return redirect()->back()->with('success','the image is essential.'); 
    }
}
