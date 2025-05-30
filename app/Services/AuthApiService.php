<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthApiService 

{
    public function register(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        $user =  User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->assignRole('custom');
        
        $user->notify(new WelcomeNotification());

        return [ $user, $token];
    }

    public function login(array $credentials): array
    {
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token', ['*'], now()->addDay())->plainTextToken;
        
        return [$user, $token];
    }

    public function logout(User $user): void
    {
        $user()->currentAccessToken()->delete();
    }
}
