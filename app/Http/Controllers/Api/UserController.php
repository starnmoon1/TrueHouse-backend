<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\HouseService;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    private $houseService;
    public $successStatus = 200;
    public $errorStatus = 500;

    public function __construct(UserService $userService, HouseService $houseService)
    {
        $this->userService = $userService;
        $this->houseService = $houseService;
    }

    public function register(Request $request) {
        $this->userService->store($request);
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

    public function findById($id) {
        $user = $this->userService->findById($id);
        return response()->json($user);
    }
    public function getAllHouseByUserID($user_id)
    {
        try {
            $house = $this->houseService->getALlHouseByUserID($user_id);
            $data = ['status' => 'success', 'data' => $house];
            return response()->json($data, $this->successStatus);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, $this->errorStatus);
        }
    }
}
