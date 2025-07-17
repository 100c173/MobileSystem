<?php

namespace App\Services\Agent;

use App\Models\AgentProfile;
use App\Models\AgentRequest;
use App\Notifications\ApprovedRequestNotification;
use App\Notifications\RejectedRequestNotification;
use App\Notifications\RependingRequestNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AgentRequestAdminService
{
    /**
     * Display a listing of the pending agent request.
     */
    public function index()
    {
        $agent_requests = AgentRequest::where('status', 'pending')->get();
        $unique_addresses = AgentRequest::distinct()->pluck('address')->toArray();
        return [
            'agent_requests'   => $agent_requests,
            'unique_addresses' => $unique_addresses,
        ];
    }
    /**
     * Display a listing of the approved agent request.
     */
    public function agent_requests_accepted()
    {
        $agent_requests = AgentRequest::where('status', 'approved')->get();
        $unique_addresses = AgentRequest::distinct()->pluck('address')->toArray();
        return [
            'agent_requests' => $agent_requests,
            'unique_addresses' => $unique_addresses,
        ];
    }
    /**
     * Display a listing of the rejected agent request.
     */
    public function agent_requests_rejected()
    {
        $agent_requests = AgentRequest::where('status', 'rejected')->get();
        $unique_addresses = AgentRequest::distinct()->pluck('address')->toArray();
        return [
            'agent_requests' => $agent_requests,
            'unique_addresses' => $unique_addresses,
        ];
    }

    /**
     * Soft delete the rejected agent request.
     */
    public function softDelete($id)
    {
        $agent_request = AgentRequest::findOrFail($id);
        if ($agent_request->status == 'rejected') {
            $agent_request->delete();
            return true;
        }
        return false;
    }

    /**
     * Approve agent request.
     */
    public function approveAgentRequest(string $id)
    {

        $agentRequest = AgentRequest::find($id);

        if (!$agentRequest) {
            throw new ModelNotFoundException("Agent Request not found");
        }

        $user = $agentRequest->user;
        $user->syncRoles(['agent']);
        $agentRequest->status = 'approved';
        $agentRequest->save();

        AgentProfile::create([
            'agent_id'      => $user->id , 
            'country_id'    => $agentRequest->country_id,
            'city_id'       => $agentRequest->city_id,
            'business_name' => $agentRequest->business_name,
            'latitude'      => $agentRequest->latitude,
            'longitude'     => $agentRequest->longitude,
        ]);

        $user->notify(new ApprovedRequestNotification());
    }

    /**
     * reject agent request.
     */
    public function rejectAgentRequest(Request $request , string $id)
    {

        $agentRequest = AgentRequest::find($id);

        if (!$agentRequest) {
            throw new ModelNotFoundException("Agent Request not found");
        }

        $agentRequest->status = 'rejected';
        $rejectionReason   = $request->reject_reason;
        $agentRequest->save();

        $user = $agentRequest->user ;
        $user->notify(new RejectedRequestNotification($rejectionReason));
    }

    /**
     * repeding agent request
     */
    public function rependingAgentRequest($id){
        $agentRequest = AgentRequest::find($id);

        if (!$agentRequest) {
            throw new ModelNotFoundException("Agent Request not found");
        }

        $agentRequest->status = 'pending';
        $agentRequest->save();
        
        $user = $agentRequest->user ;
        $user->notify(new RependingRequestNotification());
    }

    /**
     * Restore agent request.
     */
    public function restore($id)
    {
        $user = AgentRequest::onlyTrashed()->where('id', $id)->firstOrFail();
        $user->restore();

    }

    /**
     * Force delete the rejected agent request.
     */
    public function destroy($id)
    {
        AgentRequest::withTrashed()->where('id', $id)->forceDelete();
        return true;
    }

    /**
     * Display a listing of the SoftDelete agent request.
     */
    public function agent_requests_softDeleted()
    {
        $agent_requests = AgentRequest::onlyTrashed()->get();
        $unique_addresses = AgentRequest::distinct()->pluck('address')->toArray();
        return [
            'agent_requests' => $agent_requests,
            'unique_addresses' => $unique_addresses,
        ];
    }
}
