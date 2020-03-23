<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request) {
        $this->userService->store($request);
    }

    public function findById($id) {
        $user = $this->userService->findById($id);
        return response()->json($user);
    }
}
