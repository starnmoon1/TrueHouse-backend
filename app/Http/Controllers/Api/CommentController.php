<?php

namespace App\Http\Controllers\Api;

use App\House;
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

    public function showRating($id)
    {
        Try {
            $comments = House::find($id)->comments;
            $sumStar = 0;
            $countComment = 0;
            $avgStar = 0;
            foreach ($comments as $comment) {
                $countComment += 1;
                $sumStar += $comment->rating;
            }
            if ($countComment > 0) {
                $avgStar = $sumStar / $countComment;
            }
            $data = ['status' => 'success',
                'data' => $avgStar];
            return response()->json($data, 201);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 501);
        }

    }
}
