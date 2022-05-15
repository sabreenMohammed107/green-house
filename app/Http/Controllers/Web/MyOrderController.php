<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        $carts = [];
        $orders = Order::where('user_id', Auth::user()->id)->whereIN('status_id', [1,2,3])->get();

        $cart = Order::where('user_id', Auth::user()->id)->whereIN('status_id', [1,2,3])->first();
        // if ($cart) {
        //     $orders = Order_item::where('order_id', $cart->id)->get();
        // }
        $items = Item::where('user_id', Auth::user()->id)->get();
        return view('web.myOrders', compact('orders','items'));
    }
public function details($id){
$order=Order::where('id',$id)->first();
$items = Item::where('user_id', Auth::user()->id)->get();
return view('web.myOrderDetails', compact('order','items'));
}



public function confirm($id){
//conOrderPoint
$order=Order::where('id',$id)->first();
$order->update([
  'status_id'=>3,
]);
return view('web.conOrderPoint');
}


public function reject($id){
    //rejOrderPoint
    $order=Order::where('id',$id)->first();
    $order->update([
      'status_id'=>5,
    ]);
    return view('web.rejOrderPoint');
}
}
