<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\HouseService;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    private $houseService;
    private $userService;

    public function __construct(HouseService $houseService, UserService $userService)
    {
        $this->houseService = $houseService;
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->houseService->getAll();
    }

    public function store(Request $request)
    {
        return $this->houseService->store($request);
    }

    public function show($id)
    {
        return $this->houseService->findById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->houseService->update($request, $id);
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        return $this->houseService->getSearch($request);
    }

    public function getByHouse($id)
    {
        return $this->houseService->getByHouse($id);
    }

    public function getByUserId($id)
    {
        return $this->houseService->getByUserId($id);
    }
}
