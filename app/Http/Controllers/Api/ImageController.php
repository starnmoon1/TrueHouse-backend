<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\ImageService;
use Illuminate\Http\Request;


class ImageController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }


    public function index($house_id) {
        return $this->imageService->index($house_id);
    }

    public function store(Request $request, $id) {

        //     if ($request->hasFile('image'))
    //   {
    //         $file = $request->file('image');
    //         $filename  = $file->getClientOriginalName();
    //         $extension = $file->getClientOriginalExtension();
    //         $picture = date('His').'-'.$filename;
    //         $file->move(public_path('public/image/'), $picture);
    //         return response()->json(["message" => "Image Uploaded Succesfully"]);
    //   }
    //   else
    //   {
    //         return response()->json(["message" => "Select image first."]);
    //   }

        return $this->imageService->save($request, $id);
    }
}
