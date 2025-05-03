<?php

namespace App\Services;

use App\Http\Requests\AgentRequestRequest;
use App\Models\AgentRequest;
use Illuminate\Http\Request;

class AgentRequestService 
{

    public function store(AgentRequestRequest $request){
        
        $existingRequest = AgentRequest::where('user_id', $request->user()->id)->where('status','pending')->first();

        if($existingRequest){
            return response()->json(['message' => 'You already have a pending request'], 409);
        }

        $agentRequest = new AgentRequest();

        $agentRequest->user_id           = $request->user()->id;
        $agentRequest->business_name     = $request->business_name;
        $agentRequest->commercial_number = $request->commercial_number;
        $agentRequest->address           = $request->address;
        $agentRequest->latitude          = $request->latitude;
        $agentRequest->longitude         = $request->longitude;
        $agentRequest->notes             = null;
        $agentRequest->status            = 'pending';

        $agentRequest->save();

        return response()->json([
            'message' => 'Request created successfully',
            'data'    => $agentRequest,
        ],201);
    }

    public function show(Request $request){
        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->first();

        if(!$agentRequest){
            return response()->json(['message' => 'There is no registered agent request for you'], 409);
        }

        return response()->json([
            'data'    => $agentRequest,
        ],200);
    }

    
    public function showStatus(Request $request)
    {
        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->first();

        if(!$agentRequest){
            return response()->json(['message' => 'There is no registered agent request for you'], 409);
        }

        return response()->json([
            'data'    => [
                'status'  => $agentRequest-> status,
                'notes'   =>$agentRequest-> notes,
            ]
        ],200);

    }

    public function update(AgentRequestRequest $request)
    {

        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->where('status','pending')->first();

        if(!$agentRequest){
            return response()->json(['message' => 'There is no registered agent request for you'], 409);
        }


        $agentRequest->business_name       = $request->business_name;
        $agentRequest->commercial_number   = $request->commercial_number;
        $agentRequest->address             = $request->address;
        $agentRequest->latitude            = $request->latitude;
        $agentRequest->longitude           = $request->longitude;

        $agentRequest->save();

        return response()->json([
            'message' => 'Request updated successfully',
            'data'    => $agentRequest,
        ], 200);

    }

    public function destroy(Request $request)
    {
        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->where('status','pending')->first();

        if(!$agentRequest){
            return response()->json(['message' => 'There is no registered agent request for you'], 409);
        }

        $agentRequest->delete();

        return response()->json([
            'message'    => 'the agent request deleted',
        ],200);        
    }

}
