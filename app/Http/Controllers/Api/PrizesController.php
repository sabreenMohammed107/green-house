<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderItemsResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PointsResource;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\User_prize;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class PrizesController extends BaseController
{
  /**
 **
 * show all prizes
 *
 **
 */
public function index()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();

            $pints=User_prize::where('user_id','=',Auth::user()->id)->get();
            $tasks = User_prize::with(['prize']) // <-- load relationship
            ->select('id', 'name', 'description', 'deadline', 'closed_at', 'status_id', 'project_id')

            ->get();


                return $this->sendResponse(PointsResource::collection($pints), 'get all Points');

    }else {
        return $this->authCheck('an error occurred');

    }
}

}
