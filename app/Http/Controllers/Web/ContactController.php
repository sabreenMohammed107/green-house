<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        return view('web.contact');
    }

    public function sendMessage(Request $request){
        Message::create($request->except('_token'));

        \Session::flash('error', "thanks for contact");
        return view('web.contact');


    }
}
