<?php


namespace App\Http\Services\Impl;

use App\House;
use App\Http\Repositories\Eloquent\ImgRepo;
use App\Image;

class ImageService
{

    private $imgRepo;

    public function __construct(ImgRepo $imgRepo)
    {
        $this->imgRepo = $imgRepo;
    }

    public function index($houseID)
    {
        try {
            $image = $this->imgRepo->getImgByHouseId($houseID);
            $data = [
                'status' => 'success',
                'data' => $image
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            $data = [
                'status' => 'errors',
                'message' => $exception
            ];
            return response()->json($data, 500);
        }
    }

    public function save($request, $id)
    {
        try {
            request()->validate([
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if ($request->hasFile('file')) {
                $image = new Image();
                $file = $request->file('file');
                $filename  = $file->getClientOriginalName();
                // $extension = $file->getClientOriginalExtension();
                $picture = date('His') . '-' . $filename;
                $file->storeAs('public/images', $picture);
                $image->url = $picture;
                $image->house_id = $id;
                $this->imgRepo->store($image);
                $data = ['status' => 'success', 'data' => $image];
                return response()->json($data, 200);
            }
        } catch (\Exception $exception) {
            $file = $request->file('file');
            $data = ['status' => $file, 'message' => $exception];
            return response()->json($data, 501);
        }
    }



    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}
