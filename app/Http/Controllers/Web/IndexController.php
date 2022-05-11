<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Company;
use App\Models\Counters;
use App\Models\Feedback;
use App\Models\Item_category;
use App\Models\Message;
use App\Models\Slider_image;
use Illuminate\Http\Request;
use SebastianBergmann\LinesOfCode\Counter;

class IndexController extends Controller
{
    //
    protected $viewName = 'web.';

    public function index(){
        $homeSliders = Slider_image::where('active', 1)->orderBy('order', 'asc')->get();
        $categories=Item_category::limit(4)->get();
        $company=Company::where('id',1)->first();
        $counters=Counters::limit(4)->get();
        $feedbacks=Feedback::where('active', 1)->orderBy('order', 'asc')->get();
        $blogs=Blogs::limit(3)->get();

        return view($this->viewName . 'index',compact('homeSliders','categories','company','counters','feedbacks','blogs'));
    }

    public function sendMessage(Request $request){

        Message::create($request->except('_token'));
        session()->flash('success', "thanks for contact");
        return redirect()->back()->with('flash_success', "thanks for contact");
    }
}
