<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $viewName = 'web.';
     public function index(){

        $company=Company::where('id',1)->first();

        $feedbacks=Feedback::where('active', 1)->orderBy('order', 'asc')->get();


        return view($this->viewName . 'about',compact('company','feedbacks'));
     }
}
