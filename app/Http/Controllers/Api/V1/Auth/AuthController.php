<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthController extends Controller
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

            $user = $this->userService->login($newUser);

            return $this->resopnseCreated('User created!', $user);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    public function login(UserLoginRequest $request)
    {
        try {
            $user = $this->userService->login($request->all());

            return $this->resopnseOk('User logged in!', $user);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
