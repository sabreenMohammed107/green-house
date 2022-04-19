<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderItemsResource;
use App\Models\Order;
use App\Models\Order_item;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    //

    public function index()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $myCart = Order::where('user_id', $user->id)->where('status', 1)->first();
            if ($myCart) {
                $items = Order_item::where('order_id', $myCart->id)->get();
                return $this->sendResponse(OrderItemsResource::collection($items), 'get all Items');
            }else{
                return $this->sendError('some thing error in Cart');
            }

        } else {
            return $this->authCheck('an error occurred');

        }
    }


    public function AddQuantity($id)
    {
        $row = Order_item::where('id', $id)->first();
        $row->update(['quantity' => $row->quantity + 1]);
        return $this->sendResponse($row, ' Cart updated successfully.');
    }

    public function SubstractQuantity($id)
    {

        $row = Order_item::where('id', $id)->first();
        $row->update(['quantity' => $row->quantity - 1]);
        return $this->sendResponse($row, ' Cart updated successfully.');
    }


    public function placeOrder(Request $request){

    }
}
