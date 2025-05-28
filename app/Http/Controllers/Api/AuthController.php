<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateUserRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\NewUserRegisterNotification;
use App\Services\AuthApiService ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class AuthController extends Controller
{
    protected AuthApiService $authService;

    public function __construct(AuthApiService $authService)
    {
        $this->authService = $authService;
    }

    public function register(CreateUserRequest $request)
    {
        $data = $request->validated();
        [$user, $token] = $this->authService->register($data);

        $admins = user::role('admin')->get();
        
        Notification::send($admins,new NewUserRegisterNotification($user));

        return $this->registerResponse(new UserResource($user),$token);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        [$user, $token] = $this->authService->login($data);

        return $this->loginResponse(new UserResource($user), $token);
    }

    public function user(Request $request)
    {
        return $this->successResponse('User retrieved successfully', new UserResource($request->user()));
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());

        return $this->logoutResponse();
    }
}
