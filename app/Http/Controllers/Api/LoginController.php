<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($data)) {
            return response()->json(['data'=>Auth::user(), 'message'=>'success']);
        }
        else return response()->json(['message'=>'fail']);
    }

    public function logout($id){
        $user = $this->userService->findById($id);
        return response()->json($user);
    }
}
