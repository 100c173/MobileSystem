<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Brand;
use App\Models\Mobile;
use App\Models\OperatingSystem;
use App\Models\AgentMobileStock;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Mobile\MobileService;
use Illuminate\Database\QueryException;
use App\Http\Requests\Mobile\MobileRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MobileController extends Controller
{
    protected MobileService $mobileService;

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
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('dashboard.mobile.display.index', compact('mobiles'));
        }

        $my_products = AgentMobileStock::where('user_id', $user->id)->pluck('mobile_id')->toArray();
        return view('dashboard-agent.my-devices.select-devices', compact('mobiles', 'my_products'));
    }

    public function mobiles_under_review()
    {
        $mobiles = $this->mobileService->mobiles_under_review();
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('dashboard.mobile.display.mobiles_under_review', compact('mobiles'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::get();
        $operatingsystems  = OperatingSystem::get();
        return view($this->resolveViewPath('create.create'),compact('brands','operatingsystems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileRequest $request)
    {
        $mobile = $this->mobileService->store($request);
        
        if(Auth::user()->hasRole('admin'))
            return redirect()->route('admin.mobileSpcifications.create');
        else 
            return redirect()->route('agent.mobileSpcifications.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $mobile = Mobile::findOrFail($id);
        return view('dashboard.mobile.update.updateMobile', compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileRequest $request, int $id)
    {
        $this->mobileService->update($request, $id);
        return redirect()->route('mobiles.index')->with('success', 'Mobile updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->mobileService->destroy($id);
            return redirect()->back()->with('success', 'The mobile was successfully deleted.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete mobile due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete mobile due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting mobile: ' . $e->getMessage());
            abort(500);
        }
    }

    /**
     * Resolve the base view path depending on user role.
     */
    private function resolveViewPath(string $path): string
    {
        $base = Auth::user()->hasRole('admin') ? 'dashboard.mobile' : 'dashboard-agent.mobile';
        return "{$base}.{$path}";
    }

    public function mobile_accept($id)
    {
        try {
            $this->mobileService->mobile_accept($id);
            return redirect()->back()->with('success', 'The mobile was successfully added.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to add mobile due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to add mobile due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while adding mobile: ' . $e->getMessage());
            abort(500);
        }
    }

    public function mobile_reject($id)
    {
        try {
            $this->mobileService->mobile_reject($id);
            return redirect()->back()->with('success', 'The mobile was successfully rejected.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to reject mobile due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to reject mobile due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while rejecting mobile: ' . $e->getMessage());
            abort(500);
        }
    }
}
