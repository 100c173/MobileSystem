<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerDevices extends Controller
{
    public function devicesForReview()
    {
        $customer_devices = CustomerRequest::with(['images', 'brand', 'operatingSystem', 'user'])->get();
        return view('dashboard.customer_request.review_devices', compact('customer_devices'));
    }

    public function approveRequest($id)
    {
        try {
            $customerRequest = CustomerRequest::findOrFail($id);
            $customerRequest->update([
                'status' => 'approve',
            ]);
            return back()->with('success','you are approved this device');
        } catch (Exception $e) {
            Log::error('Error create customer request : ' . $e->getMessage());
            return back()->withErrors($e->getMessage());
        }
    }

    public function rejectRequest($id)
    {
        try {
            $customerRequest = CustomerRequest::findOrFail($id);
            $customerRequest->update([
                'status' => 'reject',
            ]);
            return back()->with('success','you are rejected this device');
        } catch (Exception $e) {
            Log::error('Error create customer request : ' . $e->getMessage());
            return back()->withErrors($e->getMessage());
        }
    }
}
