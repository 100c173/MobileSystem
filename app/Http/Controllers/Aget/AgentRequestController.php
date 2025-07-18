<?php

namespace App\Http\Controllers\Aget;

use App\Exceptions\AgentRequestNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequestRequest;
use Illuminate\Database\QueryException;
use App\Services\Agent\AgentRequestAdminService;
use App\Services\Agent\AgentRequestService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AgentRequestController extends Controller
{
    protected $agentRequestService;
    protected $agentRequestServiceCustom;

    public function __construct(AgentRequestAdminService $agentRequestService ,AgentRequestService $agentRequestServiceCustom)
    {
        $this->agentRequestService = $agentRequestService;
        $this->agentRequestServiceCustom = $agentRequestServiceCustom;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->agentRequestService->index();
        $agent_requests = $data['agent_requests'];
        $unique_addresses = $data['unique_addresses'];
        return view('dashboard.agents.index', compact('agent_requests', 'unique_addresses'));
    }


    public function store(AgentRequestRequest $request)
    {
        try {
            $this->agentRequestServiceCustom->store($request);
            return redirect()->route('home.page')->with('success', __('Your request has been submitted successfully and is under review. You will receive a notification soon with the result.'));
        } catch (AgentRequestNotFoundException $e) {
            return redirect()->route('home.page')->with('error' , __($e->getMessage()));
        } catch (\Exception $e) {
            // If an unexpected error occurs
            Log::error('Unable to fetch agent requests :' . $e->getMessage());
            abort(500);
        }
    }

    public function agent_requests_accepted()
    {
        try {
            $data = $this->agentRequestService->agent_requests_accepted();
            $agent_requests = $data['agent_requests'];
            $unique_addresses = $data['unique_addresses'];
            return view('dashboard.agents.accepted-agentRequests', compact('agent_requests', 'unique_addresses'));
        } catch (\Exception $e) {
            Log::error('Unable to fetch agent requests :' . $e->getMessage());
            abort(500);
        }
    }
    public function agent_requests_rejected()
    {
        try {
            $data = $this->agentRequestService->agent_requests_rejected();
            $agent_requests = $data['agent_requests'];
            $unique_addresses = $data['unique_addresses'];
            return view('dashboard.agents.rejected-agentRequests', compact('agent_requests', 'unique_addresses'));
        } catch (\Exception $e) {
            Log::error('Unable to fetch agent requests :' . $e->getMessage());
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDelete(string $id)
    {
        try {
            $this->agentRequestService->softDelete($id);
            return redirect()->back()->with('success', 'Agent request successfully deleted');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete agent request due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete agent request due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting agent request: ' . $e->getMessage());
            abort(500);
        }
    }

    public function approveAgentRequest($id)
    {
        try {
            $this->agentRequestService->approveAgentRequest($id);
            return redirect()->route('agent-requests')->with('success', 'The request was successfully approved.');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        }
    }

    public function rejectAgentRequest(Request $request, $id)
    {
        try {
            $this->agentRequestService->rejectAgentRequest($request, $id);
            return redirect()->route('agent-requests')->with('success', 'The request was successfully rejected.');;
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        }
    }

    public function restore($id)
    {
        try {
            $this->agentRequestService->restore($id);
            return redirect()->back()->with('success', 'Agent request successfully restored');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to restore agent request due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to restore agent request due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while restore agent request: ' . $e->getMessage());
            abort(500);
        }
    }

    /**
     * Force delete the rejected agent request.
     */
    public function destroy($id)
    {
        try {
            $this->agentRequestService->destroy($id);
            return redirect()->back()->with('success', 'Agent request successfully deleted');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete agent request due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete agent request due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting agent request: ' . $e->getMessage());
            abort(500);
        }
    }

    public function agent_requests_softDeleted()
    {
        try {
            $data = $this->agentRequestService->agent_requests_softDeleted();
            $agent_requests = $data['agent_requests'];
            $unique_addresses = $data['unique_addresses'];
            return view('dashboard.agents.softDeleted-agentRequests', compact('agent_requests', 'unique_addresses'));
        } catch (\Exception $e) {
            Log::error('Unable to fetch agent requests :' . $e->getMessage());
            abort(500);
        }
    }


    public function rependingAgentRequest($id)
    {
        $this->agentRequestService->rependingAgentRequest($id);
        return redirect()->route('agent-requests')->with('success', 'The request was successfully repending.');
    }
}
