<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Prizes_point;
use App\Models\User;
use App\Models\User_prize;
use Illuminate\Http\Request;

class UsersController extends Controller
{
     // This is for General Class Variables.
     protected $object;
     protected $viewName;
     protected $routeName;

     /**
      * UserController Constructor.
      *
      * @return \Illuminate\Http\Response
      */
     public function __construct(User $object)
     {
         $this->middleware('auth');

         $this->object = $object;
         $this->viewName = 'admin.users.';
         $this->routeName = 'admin-users.';
     }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=User::where('type',0)->orderBy("created_at", "Desc")->get();

        return view($this->viewName.'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $orders=Order::where('user_id',$id)->get();
       $user=User::where('id',$id)->first();
       return view($this->viewName.'orders', compact('orders','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items=Item::where('user_id',$id)->get();
        $user=User::where('id',$id)->first();
       return view($this->viewName.'items', compact('items','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userPoint($id)
    {
        $points=User_prize::where('user_id',$id)->get();
        $user=User::where('id',$id)->first();
       return view($this->viewName.'points', compact('points','user'));
    }

}
