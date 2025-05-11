<?php

namespace App\Http\Controllers\Api\Agent;

use App\Exceptions\AgentRequestNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequestRequest;
use App\Services\Agent\AgentRequestService;
use Illuminate\Http\Request;

class AgentRequestController extends Controller
{

    protected  $agentrequestService;

    public function __construct(AgentRequestService $agentRequestService)
    {
        $this->agentrequestService = $agentRequestService;
    }


    public function store(AgentRequestRequest $request)
    {
        try{
            $agentRequest = $this->agentrequestService->store($request);

            return $this->successResponse('Request created successfully', $agentRequest, 201);
        } 
        
        catch (AgentRequestNotFoundException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode() ?: 409);
        } 
        
        catch (\Exception $e) {
            // If an unexpected error occurs
            return $this->errorResponse('Request not created successfully',500);
        }
    }


    public function show(Request $request)
    {
        $agentRequest =  $this->agentrequestService->show($request);

        if ($agentRequest) {
            return $this->successResponse($agentRequest);
        }
        return $this->errorResponse('There is no registered agent request for you', 409);
    }

    public function showStatus(Request $request)
    {
        return $this->agentrequestService->showStatus($request);
    }

    public function update(AgentRequestRequest $request)
    {
        try{
            $sucess = $this->agentrequestService->update($request);
            return $this->successResponse('Request updated successfully', $sucess, 200);
        }
        catch (AgentRequestNotFoundException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode() ?: 409);
        } 
        
    }

    public function destroy(Request $request)
    {
        try {
            $this->agentrequestService->destroy($request->user());
            return $this->successResponse('The agent request deleted');
        }
        catch (AgentRequestNotFoundException $e) {
            return $this->errorResponse( $e->getMessage(), $e->getCode());
        }
        catch (\Exception $e) {
            // If an unexpected error occurs
            return $this->errorResponse('Request not updated successfully',500);
        }
    }
}
