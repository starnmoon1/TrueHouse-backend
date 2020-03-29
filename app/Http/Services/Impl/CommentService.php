<?php


namespace App\Http\Services\Impl;


use App\Comment;
use App\Http\Repositories\Eloquent\CommentRepo;

class CommentService
{
    private $commentRepo;
    public function __construct(CommentRepo $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function getAll() {
        try {
            $comments = $this->commentRepo->getAll();
            $data = ['status' => 'success',
                'data' => $comments];
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
            $comment = new Comment();

            $comment->content = $request->content;
            $comment->user_id = $request->user_id;
            $comment->house_id = $request->house_id;
            $comment->rating = $request->rating;

            $data = ['status' => 'success',
                'data' => $comment];
            return response()->json($data, 201);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 501);
        }
    }

    public function findById($id) {
        try {
            $comment = $this->commentRepo->getById($id);
            $data = ['status' => 'success',
                'data' => $comment];
            return response()->json($data, 201);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 404);
        }
    }


}
