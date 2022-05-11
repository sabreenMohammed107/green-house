<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\How_use;
use Illuminate\Http\Request;

class HowUseController extends Controller
{
    protected $viewName = 'web.';
     public function index(){

        $uses=How_use::orderBy('order', 'asc')->get();


        return view($this->viewName . 'hwoUse',compact('uses'));
     }
}
