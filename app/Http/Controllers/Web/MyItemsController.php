<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Features_list;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Item_category_feature;
use App\Models\Items_features_value;
use App\Models\Order;
use App\Models\Order_item;
use Carbon\Carbon;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * _
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::where('user_id', Auth::user()->id)->get();
        $categories = Item_category::all();
        $idsCat1 = Item_category_feature::where('item_category_id', 1)->pluck('id');
        $idsCat2 = Item_category_feature::where('item_category_id', 2)->pluck('id');
        $idsCat3 = Item_category_feature::where('item_category_id', 3)->pluck('id');
        $idsCat4 = Item_category_feature::where('item_category_id', 4)->pluck('id');






        //end
        return view('web.create-items', compact('items', 'categories',
            'idsCat1', 'idsCat2', 'idsCat3', 'idsCat4',
          ));
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
        $item=Item::create($input);
        //store items_features_values
        $i=0;
        $values=[
            'item_id'=>$item->id,
                    ];
                    if($request->get('category_id')==1){

                        for($i==0;$i<=3;$i++){
                            $values['item_category_features_id']=$request->get('item_category_features_id1_'.$i+1);
                            $values['feature_list_id']=$request->get('list1_'.$i+1);
                            $vv=Items_features_value::create($values);
                        }

                    }
                        elseif($request->get('category_id')==2){

                            for($i==0;$i<=3;$i++){
                                $values['item_category_features_id']=$request->get('item_category_features_id2_'.$i+1);
                                $values['feature_list_id']=$request->get('list2_'.$i+1);
                                $vv=Items_features_value::create($values);
                            }

                        }

                            elseif($request->get('category_id')==3){

                                for($i==0;$i<=3;$i++){
                                    $values['item_category_features_id']=$request->get('item_category_features_id3_'.$i+1);
                                    $values['feature_list_id']=$request->get('list3_'.$i+1);
                                    $vv=Items_features_value::create($values);
                                }

                            }
                                elseif($request->get('category_id')==4){

                                    for($i==0;$i<=3;$i++){
                                        $values['item_category_features_id']=$request->get('item_category_features_id4_'.$i+1);
                                        $values['feature_list_id']=$request->get('list4_'.$i+1);
                                        $vv=Items_features_value::create($values);
                                    }


                    }
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
        $row = Item::where('id', $id)->first();
        $items = Item::where('user_id', Auth::user()->id)->get();
        $categories = Item_category::all();
        $idsCat1 = Item_category_feature::where('item_category_id', 1)->pluck('id');
        $idsCat2 = Item_category_feature::where('item_category_id', 2)->pluck('id');
        $idsCat3 = Item_category_feature::where('item_category_id', 3)->pluck('id');
        $idsCat4 = Item_category_feature::where('item_category_id', 4)->pluck('id');
        return view('web.show-items', compact('row', 'items', 'categories',
        'idsCat1','idsCat2','idsCat3','idsCat4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Item::where('id', $id)->first();
        $items = Item::where('user_id', Auth::user()->id)->get();
        $categories = Item_category::all();
        $idsCat1 = Item_category_feature::where('item_category_id', 1)->pluck('id');
        $idsCat2 = Item_category_feature::where('item_category_id', 2)->pluck('id');
        $idsCat3 = Item_category_feature::where('item_category_id', 3)->pluck('id');
        $idsCat4 = Item_category_feature::where('item_category_id', 4)->pluck('id');

        return view('web.edit-items', compact('row', 'items', 'categories',
        'idsCat1','idsCat2','idsCat3','idsCat4'
    ));
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
        $row = Item::where('id', $id)->first();
        // Delete File ..
        $file = $row->image;
        $file_name = public_path('uploads/items/' . $file);
        try {
            File::delete($file_name);
            $row->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', 'this Item Related with another tables ');

            // return redirect()->back()->with('flash_danger', 'هذه القضية مربوطه بجدول اخر ..لا يمكن المسح');
        }
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
