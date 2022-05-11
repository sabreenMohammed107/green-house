<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MyItemsController extends Controller
{
    protected $object;

    protected $routeName;
    protected $message;
    protected $errormessage;
    public function __construct(Item $object)
    {

        $this->middleware('auth');
        $this->object = $object;

        $this->routeName = 'my-items.';
        $this->message = 'تم حفظ البيانات';
        $this->errormessage = 'راجع البيانات هناك خطأ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('user_id', Auth::user()->id)->get();

        return view('web.my-items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::where('user_id', Auth::user()->id)->get();
        $categories = Item_category::all();
        return view('web.create-items', compact('items', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);
        }

        $input['user_id'] = Auth::user()->id;
        Item::create($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=Item::where('id',$id)->first();
        $items = Item::where('user_id', Auth::user()->id)->get();
        $categories = Item_category::all();
        return view('web.show-items', compact('row','items', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=Item::where('id',$id)->first();
        $items = Item::where('user_id', Auth::user()->id)->get();
        $categories = Item_category::all();
        return view('web.edit-items', compact('row','items', 'categories'));
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
        $input = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);
        }

        // $input['user_id'] = Auth::user()->id;
        Item::findOrFail($id)->update($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
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
        dd('delete');
    }

    public function cart($id)
    {

//exist product
        $user = Auth::user();
        $exist = Order::where('status_id', "=", 4)->where('user_id', $user->id)->first();
        if ($exist) {
            $row = Order_item::where('order_id', $exist->id)->where('item_id', $id)->first();
            if ($row) {
                $row->update(['quantity' => $row->quantity + 1]);
            } else {
                $newItem = new Order_item();

                $newItem->order_id = $exist->id;
                $newItem->item_id = $id;
                $newItem->quantity = 1;
                $newItem->save();
            }
            return view('web.addCart');

        } else {
//create order & details
try
{
    // Disable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $newOrder = new Order();

            $newOrder->order_date = Carbon::parse(now());
            $newOrder->status_id = 4;
            $newOrder->user_id = $user->id;
            $newOrder->save();

            $newItem = new Order_item();

            $newItem->order_id = $newOrder->id;
            $newItem->item_id = $id;
            $newItem->quantity = 1;
            $newItem->save();
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // Display a successful message ...
            return view('web.addCart');



        } catch (\Exception$e) {
            DB::rollback();
            return redirect()->back()->with('flash_success', "Error");
        }
        }


    }

    /* uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/items');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
