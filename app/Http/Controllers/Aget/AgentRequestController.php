<?php

namespace App\Http\Controllers\Aget;

use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use App\Services\Agent\AgentRequestService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AgentRequestController extends Controller
{
    protected $agentRequestService;

    public function __construct(AgentRequestService $agentRequestService)
    {
        $this->agentRequestService = $agentRequestService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent_requests = $this->agentRequestService->getAllPendingRequest() ;
        return view('dashboard.agents.index',compact('agent_requests')) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approveAgentRequest($id){
        try{
            $this->agentRequestService->approveAgentRequest($id);
            return redirect()->route('agent-requests');
        }catch(ModelNotFoundException $e){
            abort(404, $e->getMessage());
        }
    }

    public function rejectAgentRequest($id){
        try{
            $this->agentRequestService->rejectAgentRequest($id);
            return redirect()->route('agent-requests');
        }catch(ModelNotFoundException $e){
            abort(404, $e->getMessage());
        }
    }
}
