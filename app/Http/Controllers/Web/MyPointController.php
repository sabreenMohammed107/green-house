<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Prizes_point;
use App\Models\User_prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class MyPointController extends Controller
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
        $points=Prizes_point::all();
        $previ_pints=User_prize::where('user_id','=',Auth::user()->id)->get();

        return view('web.myPoints',compact('points','previ_pints'));
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
            return view('web.accept');
        }else{
            return view('web.reject');
        }

    }
}
