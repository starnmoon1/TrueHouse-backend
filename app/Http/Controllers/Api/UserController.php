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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $users = $this->userService->getAll();
            $data = ['status' => 'success',
                'data' => $users];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try{
            $user = $this->userService->store($request);
            $data = ['status'=>'success',
                'data'=>$user];
            return response()->json($data, 200);
        } catch (\Exception $exception){
            $data = ['status'=>'errors',
                'message'=>$exception];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try{
            $user = $this->userService->findById($id);
            $data = ['status'=>'success',
                'data'=>$user];
            return response()->json($data, 200);
        } catch (\Exception $exception){
            $data = ['status'=>'errors',
                'message'=>$exception];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
