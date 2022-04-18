<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemsResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends BaseController
{
    //

    public function index(){
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            $items=Item::where('user_id',$user->id)->get();
            return $this->sendResponse(ItemsResource::collection($items), 'get all Items');
        }else{
            return $this->authCheck('an error occurred');

        }
    }


    public function singleItem($id)
    {


        if (Auth::guard('api')->check()) {
            $row = Item::where('id', '=', $id)->first();
            if ($row) {
                return $this->sendResponse(new ItemsResource($row), 'Item Details');
            } else {
                return $this->sendError('an error occurred there is no Item');
            }
        } else {
            return $this->authCheck('an error occurred');

        }

    }

}
