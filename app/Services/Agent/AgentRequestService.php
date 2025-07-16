<?php

namespace App\Services\Agent;

use App\Exceptions\AgentRequestNotFoundException;
use App\Http\Requests\AgentRequestRequest;
use App\Models\AgentRequest;
use App\Models\User;
use App\Notifications\AgentRequestNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AgentRequestService
{

    public function store(AgentRequestRequest $request)
    {
        
        $existingRequest = AgentRequest::where('user_id', $request->user()->id)->where('status', 'pending')->first();

        if ($existingRequest) {
            throw new AgentRequestNotFoundException('You already have a pending request');
        }

        $agentRequest = new AgentRequest();

        $agentRequest->user_id           = $request->user()->id;
        $agentRequest->business_name     = $request->business_name;
        $agentRequest->commercial_number = $request->commercial_number;
        $agentRequest->country_id        = $request->country_id;
        $agentRequest->city_id           = $request->city_id;
        $agentRequest->latitude          = $request->latitude;
        $agentRequest->longitude         = $request->longitude;
        $agentRequest->status            = 'pending';

        $agentRequest->save();


        $admins = User::role('admin')->get();
        $user = User::findOrFail($request->user()->id);

        Notification::send($admins, new AgentRequestNotification($user));

        return $agentRequest;
    }

    public function show(Request $request)
    {
        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->first();

        return $agentRequest;
    }


    public function showStatus(Request $request)
    {
        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->first();

        return $agentRequest;
    }

    public function update(AgentRequestRequest $request)
    {

        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->where('status', 'pending')->first();

        if (!$agentRequest) {
            throw new AgentRequestNotFoundException();
        }


        $agentRequest->business_name       = $request->business_name;
        $agentRequest->commercial_number   = $request->commercial_number;
        $agentRequest->address             = $request->address;
        $agentRequest->latitude            = $request->latitude;
        $agentRequest->longitude           = $request->longitude;
        $agentRequest->notes               = $request->notes;

        $agentRequest->save();

        return $agentRequest;
    }

    public function destroy(Request $request)
    {
        $agentRequest = AgentRequest::where('user_id', $request->user()->id)->where('status', 'pending')->first();

        if (!$agentRequest) {
            throw new AgentRequestNotFoundException();
        }

        $agentRequest->delete();
    }
}
