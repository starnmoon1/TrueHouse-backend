<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\Eloquent\OrderRepo;
use App\Http\Services\OrderServiceInterface;
use App\Order;

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
        try {
            $order = new Order();
            $order->customer_name = $request->customer_name;
            $order->customer_phone = $request->customer_phone;
            $order->checkin = $request->checkin;
            $order->checkout = $request->checkout;
            $order->status = $request->status;
            $order->totalPrice = $request->totalPrice;
            $order->house_id = $request->house_id;
            $order->user_id = $request->user_id;
            $this->orderRepo->store($order);
            $data = ['status' => 'success',
                'data' => $order];
            return response()->json($data, 201);
        } catch (\Exception $exception) {
            $data = ['status' => 'errors',
                'message' => $exception];
            return response()->json($data, 501);
        }
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
