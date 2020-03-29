<?php


namespace App\Http\Repositories\Eloquent;


use App\Comment;

class CommentRepo
{
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getAll() {
        return $this->comment->all();
    }

    public function save($obj) {
        $obj->save();
    }

    public function getById($id) {
        return $this->comment->findOrFail($id);
    }

    public function delete($obj) {
        $obj->delete;
    }

}
