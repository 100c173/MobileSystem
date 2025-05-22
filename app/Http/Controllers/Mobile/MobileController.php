<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileRequest;
use App\Models\AgentMobileStock;
use App\Models\Mobile;
use App\Services\Mobile\MobileService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $user = Auth::user() ; 
        if($user->hasRole('admin'))
          return view('dashboard.mobile.display.index',compact('mobiles'));
        else{
          $my_products = AgentMobileStock::where('user_id',$user->id)->pluck('mobile_id')->toArray();
          return view('dashboard-agent.my-devices.select-devices',compact('mobiles','my_products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mobile.create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileRequest $request)
    {
        $mobile = $this->mobileService->store($request);
        return view('dashboard.mobile.create.createSpecification',compact('mobile'))->with('success','The mobile was successful added.');
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
        $mobile = Mobile::findOrFail($id);
        return view('dashboard.mobile.update.updateMobile',compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileRequest $request,  $id)
    {
        $this->mobileService-> update( $request,$id);       
        return redirect()->route('mobiles.index')->with('success','Mobile updated ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->mobileService->destroy($id);
            return redirect()->back()->with('success','The mobile was successful deleted.');
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

}
