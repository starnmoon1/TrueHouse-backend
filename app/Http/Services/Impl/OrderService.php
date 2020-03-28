<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\Eloquent\OrderRepo;
use App\Http\Services\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    private $orderRepo;

    public function __construct(OrderRepo $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getOrdersByHouseID($house_id)
    {
        return $this->orderRepo->getAllOrdersByHouseID($house_id);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}
