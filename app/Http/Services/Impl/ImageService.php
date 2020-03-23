<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\Eloquent\ImgRepo;
use App\Http\Services\ImageServiceInterface;
use Illuminate\Support\Facades\Request;

class ImageService
{

    private $imgRepo;

    public function __construct(ImgRepo $imgRepo)
    {
        $this->imgRepo = $imgRepo;
    }

    public function index($houseID)
    {
        return $this->imgRepo->getImgByHouseId($houseID);
    }

    public function save($request)
    {
        try {
            request()->validate([
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);
            if ($image = $request->file('image')) {
                foreach ($image as $files) {
                    $destinationPath = 'public/image/';
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $insert[]['image'] = "$profileImage";
                }
            }

            $check = $this->save($insert);
            $data = ['status' => 'success',
                'data' => $check];
            return response()->json($data, 200);

        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 404);
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
