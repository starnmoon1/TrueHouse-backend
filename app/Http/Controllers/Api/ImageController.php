<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\ImageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
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

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request, $id) {
        return $this->imageService->save($request, $id);
    }
}
