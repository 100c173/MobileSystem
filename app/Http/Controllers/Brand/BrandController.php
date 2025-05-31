<?php

namespace App\Http\Controllers\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Brand\BrandService;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $brands = $this->brandService->index();
        return view('dashboard.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->brandService->store($request);
        return redirect()->back()->with('success', 'The brand was successfully added.');
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
         $this->brandService->update($request, $id);
        return redirect()->back()->with('success', 'Brand updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
         try {
            $this->brandService->destroy($id);
            return redirect()->back()->with('success', 'The brand was successfully deleted.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete brand due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete brand due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting brand: ' . $e->getMessage());
            abort(500);
        }
    }

    public function mobilesByBrand($id)
    {
        $mobiles = $this->brandService->mobilesByBrand($id);
        return view('dashboard.brand.mobiles',compact('mobiles'));
    }
}
