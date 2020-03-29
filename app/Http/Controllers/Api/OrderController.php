<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\OrderService;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 500;
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrdersByHouseID($house_id)
    {
        try {
            $order = $this->orderService->getOrdersByHouseID($house_id);
            return response()->json($order, $this->successStatus);
        } catch (Exception $exception) {
            return response()->json($exception, $this->errorStatus);
        }
    }

    public function store(Request $request)
    {
        return $this->orderService->store($request);
    }
}
