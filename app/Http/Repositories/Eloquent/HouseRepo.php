<?php

namespace App\Http\Repositories\Eloquent;

use App\House;
use App\Http\Repositories\HouseInterface;
use App\User;
use Illuminate\Support\Facades\DB;

class HouseRepo implements HouseInterface
{
    private $house;
    private $user;

    public function __construct(House $house, User $user)
    {
        $this->house = $house;
        $this->user =$user;
    }

    public function getAll()
    {
        return $this->house->all();
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function update($obj)
    {
        $obj->save();
    }

    public function destroy($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->house->findOrFail($id);
    }

    public function getAllHouseByUserID($user_id)
    {
        return DB::select('SELECT * FROM houses WHERE user_id = ?',$user_id);
    }
}
