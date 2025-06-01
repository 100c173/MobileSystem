<?php

namespace App\Http\Controllers\Os;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Services\Os\OperatingSystemService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OperatingSystemController extends Controller
{
    protected $osService;

    public function __construct(OperatingSystemService $osService)
    {
        $this->osService = $osService;
    }
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $oss = $this->osService->index();
        return view('dashboard.os.index',compact('oss'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->osService->store($request);
        return redirect()->back()->with('success', 'The operating system was successfully added.');
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
         $this->osService->update($request, $id);
        return redirect()->back()->with('success', 'Operating system updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
         try {
            $this->osService->destroy($id);
            return redirect()->back()->with('success', 'The operating system  was successfully deleted.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete operating system due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete operating system due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting operating system: ' . $e->getMessage());
            abort(500);
        }
    }

    public function mobilesByOs($id)
    {
        $mobiles = $this->osService->mobilesByOs($id);
        return view('dashboard.os.mobiles',compact('mobiles'));
    }
}
