<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileDescriptionRequest;
use App\Models\MobileDescription;
use App\Services\Mobile\MobileDescriptionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Models\Mobile;

class MobileDescriptionController extends Controller
{
    protected MobileDescriptionService $mobileDescriptionService;

    public function __construct(MobileDescriptionService $mobileDescriptionService)
    {
        $this->mobileDescriptionService = $mobileDescriptionService;
    }

    /**
     * Display a listing of the mobile specification.
     */
    public function description(int $id)
    {
        try {
            $data = $this->mobileDescriptionService->description($id);
            $description = $data['description'];
            $mobile = $data['mobile'];
            return view($this->resolveViewPath('display.mobile_description'), compact('description', 'mobile'));

        } catch (ModelNotFoundException $e) {
            try {
                $mobile = $this->mobileDescriptionService->add_description($id);
                return view($this->resolveViewPath('display.mobile_description'), compact('mobile'));
            } catch (ModelNotFoundException $e) {
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
    public function create_description(int $id)
    {
        try {
            $mobile = $this->mobileDescriptionService->create_description($id);
            return view($this->resolveViewPath('create.createDescription'), compact('mobile'));
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error creating mobile description: ' . $e->getMessage());
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileDescriptionRequest $request)
    {
        $this->mobileDescriptionService->store($request);

        $route = Auth::user()->hasRole('admin') ? 'admin.mobiles.index' : 'agent.mobiles.index';
        return redirect()->route($route)->with('success', 'The mobile description was successfully added.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $description = MobileDescription::findOrFail($id);
        $mobile = Mobile::findOrFail($description->mobile_id);
        $this->authorize('update',$mobile);
        return view($this->resolveViewPath('update.updateDescription'), compact('description'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileDescriptionRequest $request, int $id)
    {
        $this->mobileDescriptionService->update($request, $id);
        return redirect()->route('mobiles.index')->with('success', 'Mobile description updated');
    }

    /**
     * Resolve the base view path depending on user role.
     */
    private function resolveViewPath(string $path): string
    {
        $base = Auth::user()->hasRole('admin') ? 'dashboard.mobile' : 'dashboard-agent.mobile';
        return "{$base}.{$path}";
    }
}
