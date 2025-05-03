<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequestRequest;
use App\Models\AgentRequest;
use App\Services\AgentRequestService;
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
        return $this->agentrequestService->store($request);

    }

  
    public function show(Request $request)
    {
        return $this->agentrequestService->show($request);

    }

    public function showStatus(Request $request)
    {
        return $this->agentrequestService->showStatus($request);
    }


    public function edit(string $id)
    {
        //
    }

    public function update(AgentRequestRequest $request)
    {

        return $this->agentrequestService->update($request);

    }

    public function destroy(Request $request)
    {
        return $this->agentrequestService->update($request);    
    }

}
