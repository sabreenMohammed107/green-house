<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class MyCartController extends Controller
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
        $order = Order::where('user_id', Auth::user()->id)->where('status_id', 4)->first();

        $cart = Order::where('user_id', Auth::user()->id)->where('status_id', 4)->first();
        if ($cart) {
            $carts = Order_item::where('order_id', $cart->id)->get();
        }
        $items = Item::where('user_id', Auth::user()->id)->get();
        return view('web.myCart', compact('carts','items','order'));
    }

    public function addQty(Request $req)
    {
        // dd($req->item_id);

        if ($req->ajax()) {
            $item_id = $req->item_id;

            $orderItem=Order_item::where('id',$item_id)->first();
            if($orderItem){
                $orderItem->update(['quantity' => $orderItem->quantity + 1]);

            $carts = [];
            $cart = Order::where('id', $orderItem->order_id)->first();
            if ($cart) {
                $carts = Order_item::where('order_id', $cart->id)->get();
            }
        }

            $ajaxComponent = view('web.mycartTable', [
                'carts' => $carts,


            ]);

            return $ajaxComponent->render();
        }
    }


    public function subQty(Request $req)
    {

        if ($req->ajax()) {
            $item_id = $req->item_id;

            $orderItem=Order_item::where('id',$item_id)->first();
            if($orderItem){
                $orderItem->update(['quantity' => $orderItem->quantity - 1]);

            $carts = [];
            $cart = Order::where('id', $orderItem->order_id)->first();
            if ($cart) {
                $carts = Order_item::where('order_id', $cart->id)->get();
            }
        }

            $ajaxComponent = view('web.mycartTable', [
                'carts' => $carts,


            ]);

            return $ajaxComponent->render();
        }
    }
    //del/orderItem


    public function delOrderItem(Request $req)
    {

        if ($req->ajax()) {
            $item_id = $req->item_id;

            $orderItem=Order_item::where('id',$item_id)->first();
            if($orderItem){

            $carts = [];
            $cart = Order::where('id', $orderItem->order_id)->first();
            $orderItem->delete();
            if ($cart) {
                $carts = Order_item::where('order_id', $cart->id)->get();
            }



        }

            $ajaxComponent = view('web.myCartTable', [
                'carts' => $carts,


            ]);

            return $ajaxComponent->render();
        }
    }



    public function palceOrder(Request $req){

        $row = Order::where('id', $req->order_id)->first();
        if($row){
            $row->update(['status_id' => 2]);
            return view('web.confirmation');
        }else{

            return redirect()->back()->with('flash_success', "Error");        }

    }
}

