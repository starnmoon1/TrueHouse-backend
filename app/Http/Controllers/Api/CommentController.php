<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        return $this->commentService->getAll();
    }

    public function store(Request $request)
    {
        return $this->commentService->store($request);
    }

    public function show($id)
    {
        return $this->commentService->findById($id);
    }
}
