<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        try {
            $newUser = $this->userService->register($request->all());

            $userData = [
                'username' => $newUser['user']['user_name'],
                'password' => $newUser['password'],
            ];

            $user = $this->userService->login($userData);

            return response()->json([
                'token' => $user['token'],
                'type_token' => 'bearer',
                'user' => $user['user']
            ], 200);
            
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
