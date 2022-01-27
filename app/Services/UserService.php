<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register($data)
    {
        $user = User::create([
            'user_name' => $data['user_name'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return [
            'user' => $user,
            'password' => $data['password']
        ];
    }

    public function login($data)
    {
        $fieldType = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        if (!auth()->attempt([$fieldType => $data['username'], 'password' => $data['password']])) {
            return ['error' => 'UnAuthorised Access'];
        }

        if (isset(auth()->user()->profile->camplaint)) {
            return ['error' => 'UnAuthorised Access'];
        }

        return  [
            "token" => auth()->user()->createToken(env('PASSPORT_TOKEN'))->accessToken,
            "user" => auth()->user()
        ];
    }
}
