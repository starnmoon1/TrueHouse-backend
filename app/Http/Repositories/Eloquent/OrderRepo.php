<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\OrderRepoInterface;
use App\Order;
use Illuminate\Support\Facades\DB;

class OrderRepo implements OrderRepoInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function update($obj)
    {
        // TODO: Implement update() method.
    }

    public function destroy($obj)
    {
        // TODO: Implement destroy() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function getAllOrdersByHouseID($house_id)
    {
        return DB::table('orders')
            ->where('house_id', '=', $house_id)
            ->orderBy('created_at')
            ->get();
    }
}
