<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\ImageService;

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

    public function store($request) {
        return $this->imageService->save($request);
    }

}
