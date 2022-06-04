<?php

namespace App\Http\Controllers;

use App\Models\Features_list;
use App\Models\Item_category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use File;
class CategoryItemsController extends Controller
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
     public function __construct(Item_category $object)
     {
         $this->middleware('auth');

         $this->object = $object;
         $this->viewName = 'admin.item-category.';
         $this->routeName = 'admin-item-category.';
     }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Item_category::all();
        return view($this->viewName.'index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewName . 'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token','img']);

            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['image'] = $this->UplaodImage($attach_image);
            }


            Item_category::create($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=Item_category::where('id',$id)->first();
        $lists=Features_list::distinct('item_category_features_id')->whereHas('feature', function ($q) use ($id){
            $q->where('item_category_id', $id);
        })->get();
// dd($lists);
        return view($this->viewName.'show',compact('row','lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=Item_category::where('id',$id)->first();

        return view($this->viewName.'edit',compact('row'));
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
        $input = $request->except(['_token','img']);

        if ($request->hasFile('img')) {
            $attach_image = $request->file('img');

            $input['image'] = $this->UplaodImage($attach_image);
        }


        Item_category::findOrFail($id)->update($input);
return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row=Item_category::where('id',$id)->first();
        // Delete File ..
        $file = $row->image;
        $file_name = public_path('uploads/categories/' . $file);
        try {
            File::delete($file_name);
            $row->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

            // return redirect()->back()->with('flash_danger', 'هذه القضية مربوطه بجدول اخر ..لا يمكن المسح');
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
          $uploadPath = public_path('uploads/categories');

          // Move The image..
          $file->move($uploadPath, $imageName);

          return $imageName;
      }
}
