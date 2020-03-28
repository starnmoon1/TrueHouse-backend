<?php


namespace App\Http\Repositories\User;


use App\Http\Repositories\RepoInterface;
use App\User;
use Illuminate\Support\Facades\DB;

class UserRepo implements RepoInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return DB::table('users')
            ->orderBy('name', 'desc')
            ->get();
    }

    public function findById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function save($obj)
    {
        $obj->save();
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        $obj->delete();
    }

    public function update($obj)
    {
        $obj->save();
    }

    public function destroy($obj)
    {
        $obj->delete();
    }

}
