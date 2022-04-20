<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderItemsResource;
use App\Models\Order;
use App\Models\Order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class CartController extends BaseController
{
    //

    public function index()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $myCart = Order::where('user_id', $user->id)->where('status_id', 1)->first();
            if ($myCart) {
                $items = Order_item::where('order_id', $myCart->id)->get();
                return $this->sendResponse(OrderItemsResource::collection($items), 'get all Items');
            } else {
                return $this->sendError('some thing error in Cart/ cart not pending');
            }

        } else {
            return $this->authCheck('an error occurred');

        }
    }

    public function addItem(Request $request)
    {

        $validator =Validator::make($request->all(), [
            'item_id' => 'required',

        ]);
//exist product
        $user = Auth::user();
        $exist = Order::where('status_id', "=", 0)->where('user_id', $user->id)->first();
        if ($exist) {
            $row = Order_item::where('order_id', $exist->id)->where('item_id', $request->item_id)->first();
            if ($row) {
                $row->update(['quantity' => $row->quantity + 1]);
            } else {
                $newItem = new Order_item();

                $newItem->order_id = $exist->id;
                $newItem->item_id = $request->item_id;
                $newItem->quantity = 1;
                $newItem->save();
            }
            return $this->sendResponse(null, ' Cart updated successfully.');
        } else {
//create order & details
try
{
    // Disable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $newOrder = new Order();

            $newOrder->order_date = Carbon::parse(now());
            $newOrder->status_id = 0;
            $newOrder->user_id = $user->id;
            $newOrder->save();

            $newItem = new Order_item();

            $newItem->order_id = $newOrder->id;
            $newItem->item_id = $request->item_id;
            $newItem->quantity = 1;
            $newItem->save();
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // Display a successful message ...
            return $this->sendResponse(null, ' Cart updated successfully.');
        } catch (\Exception$e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
        }
        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
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

    public function placeOrder(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'order_id' => 'required',

        ]);

        $row = Order::where('id', $request->order_id)->first();
        if($row){
            $row->update(['status_id' => 2]);
            return $this->sendResponse($row, ' Order is waitpoints.');
        }else{

            return $this->sendError(null, 'Error Order Not Pending!!');
        }

    }
}
