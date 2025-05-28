<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileImageRequest;
use App\Services\Mobile\MobileImageService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MobileImageController extends Controller
{
    protected $mobileImageService;

    public function __construct(MobileImageService $mobileImageService)
    {
        $this->mobileImageService = $mobileImageService;
    }

    /**
     * Display a listing of the mobile images.
     */
    public function images($id)
    {
        try {
            $data = $this->mobileImageService->images($id);

            $view = Auth::user()->hasRole('admin')
                ? 'dashboard.mobile.mobile_images'
                : 'dashboard-agent.mobile.mobile_images';

            return view($view, [
                'images' => $data['images'],
                'mobile' => $data['mobile'],
            ]);
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing mobile images: ' . $e->getMessage());
            abort(500, 'Unexpected error occurred.');
        }
    }

    /**
     * Store a newly uploaded image.
     */
    public function store(MobileImageRequest $request)
    {
        try {
            $this->mobileImageService->store($request);
            return redirect()->back()->with('success', 'Image added successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing mobile image: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add image.');
        }
    }

    /**
     * Remove the specified image from storage.
     */
    public function destroy($id)
    {
        try {
            $this->mobileImageService->destroy($id);
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('DB constraint on deleting image: ' . $e->getMessage());
            abort(500, 'Cannot delete image due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting image: ' . $e->getMessage());
            abort(500, 'Unexpected error occurred.');
        }
    }

    /**
     * Mark image as non-essential.
     */
    public function make_image_unEssential($id)
    {
        try {
            $this->mobileImageService->make_image_unEssential($id);
            return redirect()->back()->with('success', 'Image marked as non-essential.');
        } catch (\Exception $e) {
            Log::error('Error making image unessential: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update image status.');
        }
    }

    /**
     * Mark image as essential.
     */
    public function make_image_essential($id, $mobileId)
    {
        try {
            $this->mobileImageService->make_image_essential($id, $mobileId);
            return redirect()->back()->with('success', 'Image marked as essential.');
        } catch (\Exception $e) {
            Log::error('Error making image essential: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update image status.');
        }
    }
}
