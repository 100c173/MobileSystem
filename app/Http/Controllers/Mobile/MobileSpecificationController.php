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
    
    public function specification($id)
    {
        try {
            $data = $this->mobileSpecificationService->specification($id);
            $specification = $data['specification'];
            $mobile = $data['mobile'];
            return view('dashboard.mobile.display.mobile_specification', compact('specification','mobile'));
        } catch (ModelNotFoundException $e) {
            try{
                $mobile = $this->mobileSpecificationService->add_specification($id);
                return view('dashboard.mobile.display.mobile_specification', compact('mobile'));
            }catch (ModelNotFoundException $e){
                abort(404, $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('Error showing mobile specification: ' . $e->getMessage());
            abort(500);
        }
    }

    public function create_specification($id)
    {
        try{
            $mobile = $this->mobileSpecificationService->create_specification($id);
            return view('dashboard.mobile.create.createSpecification',compact('mobile'));
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing mobile description: ' . $e->getMessage());
            abort(500);
        }
    }
      



    public function store(MobileSpecificationRequest $request)
    {
        $this->mobileSpecificationService->store($request);
        $mobile = Mobile::findorFail($request->mobile_id);
        if($mobile->description){
            return redirect()->route('mobiles.index')->with('success','The mobile Specification was successful added.');
        }else{
            return view('dashboard.mobile.create.createDescription',compact('mobile'))->with('success','The mobile Specification was successful added.');
        }
 
    }



    public function edit($id)
    {
        $specification = MobileSpecification::findOrFail($id);
        return view('dashboard.mobile.update.updateSpecification', compact('specification'));
    }

 
    public function update(MobileSpecificationRequest $request,  $id)
    {
        $this->mobileSpecificationService->update($request, $id);
        return redirect()->route('mobiles.index')->with('success', 'Mobile specification updated ');
    }


    public function destroy(string $id)
    {
        //
    }
}
