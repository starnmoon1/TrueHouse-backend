<?php

namespace App\Http\Services\Impl;

use App\House;
use App\Http\Repositories\Eloquent\HouseRepo;
use App\Http\Services\HouseServiceInterface;

class HouseService implements HouseServiceInterface
{
    private $houseRepo;

    public function __construct(HouseRepo $houseRepo)
    {
        $this->houseRepo = $houseRepo;
    }

    public function getAll()
    {
        try {
            $house = $this->houseRepo->getAll();
            $data = ['status' => 'success',
                'data' => $house];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 500);
        }
    }

    public function store($request)
    {
        try {
            $house = new House();

            $house->name_house = $request->name_house;
            $house->house_type = $request->house_type;
            $house->room_type = $request->room_type;
            $house->address = $request->address;
            $house->bed_room_num = $request->bed_room_num;
            $house->bath_room_num = $request->bath_room_num;
            $house->description = $request->description;
            $house->price = $request->price;
            $house->user_id = $request->user_id;
            $house->status = $request->status;
            $this->houseRepo->store($house);

            $data = ['status' => 'success',
                'data' => $house];
            return response()->json($data, 201);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 501);
        }
    }

    public function update($request, $id)
    {
        # code...
    }

    public function destroy($id)
    {

    }

    public function findById($id)
    {
        try {
            $house = $this->houseRepo->findById($id);
            $data = ['status' => 'success',
                'data' => $house];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 404);
        }
    }

    public function getALlHouseByUserID($user_id)
    {
        return $this->houseRepo->getAllHouseByUserID($user_id);
    }

    public function getSearch($request)
    {
        try {
            $house = $this->houseRepo->getSearch($request);
            $data = ['status' => 'success',
                'data' => $house];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 500);
        }
    }

}
