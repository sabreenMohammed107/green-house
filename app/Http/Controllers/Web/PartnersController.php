<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index(){

        $partners=Partner::orderBy('order', 'asc')->paginate(6);
        return view('web.partners',compact('partners'));

    }

    public function fetch_data(Request $request)
    {

        if ($request->ajax()) {
            $partners = Partner::orderBy("created_at", "Desc")->paginate(6);

            return view('web.partnersList', compact('partners'))->render();
        }
    }
}
