<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderItemsResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    /**
 **
 * show all orders []waitpoint - pendding - confirm
 *
 **
 */
public function index()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $myOrders = Order::where('user_id', $user->id)->where('status_id','!=',4)->get();

                return $this->sendResponse(OrderResource::collection($myOrders), 'get all Orders');

    }else {
        return $this->authCheck('an error occurred');

    }
}

/**
 **
 * show single Order
 * paramter is order id
 **
 */
public function singleOrder($id){


        $user = Auth::guard('api')->user();
        $myOrder = Order::where('id', $id)->first();
        if ($myOrder) {
            $items = Order_item::where('order_id', $id)->get();
            return $this->sendResponse(OrderItemsResource::collection($items), 'get all Items In Order');
        } else {
            return $this->sendError('some thing error in Order/ Order not Found');
        }



}

public function confirm($id){
    $myOrder = Order::where('id', $id)->first();
    if ($myOrder) {
        $myOrder->update([
            'status_id'=>3,
          ]);
        return $this->sendResponse(OrderResource::collection($myOrder), 'Confirming order');
    } else {
        return $this->sendError('some thing error in Order/ Order not Found');
    }
}


public function reject($id){
    $myOrder = Order::where('id', $id)->first();
    if ($myOrder) {
        $myOrder->update([
            'status_id'=>5,
          ]);
        return $this->sendResponse(OrderResource::collection($myOrder), 'reject order');
    } else {
        return $this->sendError('some thing error in Order/ Order not Found');
    }

}

}
