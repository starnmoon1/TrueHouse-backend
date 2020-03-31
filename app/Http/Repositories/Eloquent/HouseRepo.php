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
        $this->user = $user;
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
        return DB::select('SELECT * FROM houses WHERE user_id = ?', $user_id);
    }

    public function getSearch($obj)
    {
        $address = null;
        $bedRoom = null;
        $bathRoom = null;
        $price = null;
        if ($obj->address != null) {
            $address = "AND `address` LIKE '%$obj->address%'";
        }
        if ($obj->address == 'null') {
            $address = null;
        }

        if ($obj->bed_room_num != null) {
            $bedRoom = "AND `bed_room_num` = '$obj->bed_room_num'";
        }
        if ($obj->bed_room_num == 'null') {
            $bedRoom = null;
        }

        if ($obj->bath_room_num != null) {
            $bathRoom = "AND `bath_room_num` = '$obj->bath_room_num'";
        }
        if ($obj->bath_room_num == 'null') {
            $bathRoom = null;
        }

        if ($obj->price != null) {
            $price = "AND `price` = '$obj->price'";
        }
        if ($obj->price == 'null') {
            $price = null;
        }

        $start = $obj->start;
        $end = $obj->end;
        return DB::select("SELECT * FROM `houses`
        WHERE (`updated_at` >= '$start'
        AND `updated_at` <= '$end')
        $address
        $bedRoom
        $bathRoom
        $price
        ");
    }

    public function getByHouse($id)
    {
        return DB::select("SELECT * FROM `orders`
        INNER JOIN `houses` ON orders.house_id = houses.id
        INNER JOIN `users` ON orders.user_id = users.id
        WHERE houses.user_id = $id");
    }

    public function getByUserId($id)
    {
        return DB::select("SELECT * FROM `orders`
        INNER JOIN `houses` ON orders.house_id = houses.id
        INNER JOIN `users` ON orders.user_id = users.id
        WHERE users.id = $id");
    }
}
