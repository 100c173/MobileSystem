<?php

namespace App\Http\Controllers\Aget;

use App\Models\AgentRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Services\Agent\AgentRequestAdminService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AgentRequestController extends Controller
{
    protected $agentRequestService;

    public function __construct(AgentRequestAdminService $agentRequestService)
    {
        $this->agentRequestService = $agentRequestService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        try{
            $data = $this->agentRequestService->index();
            $agent_requests =$data['agent_requests'];
            $unique_addresses =$data['unique_addresses'];
            return view('dashboard.agents.index',compact('agent_requests','unique_addresses')) ;  
        }catch(\Exception $e){
            Log::error('Unable to fetch agent requests :'.$e->getMessage());
            abort(500);
        }
    }


    public function agent_requests_accepted()
    {       
        try{
            $data = $this->agentRequestService->agent_requests_accepted();
            $agent_requests =$data['agent_requests'];
            $unique_addresses =$data['unique_addresses'];
            return view('dashboard.agents.accepted-agentRequests',compact('agent_requests','unique_addresses')) ;  
        }catch(\Exception $e){
            Log::error('Unable to fetch agent requests :'.$e->getMessage());
            abort(500);
        }
    }
    public function agent_requests_rejected()
    {       
        try{
            $data = $this->agentRequestService->agent_requests_rejected();
            $agent_requests =$data['agent_requests'];
            $unique_addresses =$data['unique_addresses'];
            return view('dashboard.agents.rejected-agentRequests',compact('agent_requests','unique_addresses')) ;  
        }catch(\Exception $e){
            Log::error('Unable to fetch agent requests :'.$e->getMessage());
            abort(500);
        }
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

    public function approveAgentRequest($id){
        try{
            $this->agentRequestService->approveAgentRequest($id);
            return redirect()->route('agent-requests')->with('success','The request was successfully approved.');
        }catch(ModelNotFoundException $e){
            abort(404, $e->getMessage());
        }
    }

    public function rejectAgentRequest($id){
        try{
            $this->agentRequestService->rejectAgentRequest($id);
            return redirect()->route('agent-requests')->with('success','The request was successfully rejected.');;
        }catch(ModelNotFoundException $e){
            abort(404, $e->getMessage());
        }
    }

    public function restore($id){
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
        try{
            $data = $this->agentRequestService->agent_requests_softDeleted();
            $agent_requests =$data['agent_requests'];
            $unique_addresses =$data['unique_addresses'];
            return view('dashboard.agents.softDeleted-agentRequests',compact('agent_requests','unique_addresses')) ;  
        }catch(\Exception $e){
            Log::error('Unable to fetch agent requests :'.$e->getMessage());
            abort(500);
        }
    }
}
