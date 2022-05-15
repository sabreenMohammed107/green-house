<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderItemsResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PointsResource;
use App\Http\Resources\UserPrizeResurce;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Prizes_point;
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
            $pints=Prizes_point::all();



                return $this->sendResponse(PointsResource::collection($pints), 'get all prizes');


}


public function getPoint($id){
    $point=Prizes_point::where('id',$id)->first();
    $prize=new User_prize();

    $prize->user_id=Auth::user()->id;
    $prize->prize_id=$point->id;
    $prize->confirm_date= Carbon::parse(now());;
    $prize->confirm_points=$point->points;

    if(Auth::user()->current >=$point->points ) {

        $prize->save();
        return $this->sendResponse(new UserPrizeResurce($prize), 'You Are Get This Prize');

        // return view('web.accept');
    }else{
        return $this->sendError(null, 'Error Your Points Less Than Prize !!');
    }

}

}
