<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use App\Models\Product;
use DB;
class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( request $request )
    {
        //
        $key= $request->search;
        $category =Category::where('name','like','%'. $key .'%')->paginate(3);
        return view('auth.admin.category.list',['categories'=> $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
      
        return view('auth.admin.category.create');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, category $category)
    {
        //
        
        if ($request->hasFile('image')) {
            
            $ext = $request->image->getClientOriginalExtension();
            $file= date('YmdHis').rand(1,9999).'.'.$ext;
            $request->image->storeAs('/public/images',$file);     
        }
        else
        {
            $file ="";
        }
        $category->name = $request->name;
        $category->image = $file;
        $category->descripsion=  $request->descripsion;
        $category->save();
        
        $notification = array(
            'message' => 'Đã Tạo danh mục',
            'alert-type' => 'success'
        );
        return redirect()->route('adminCategory.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //    
        return view('auth.admin.category.edit',['category'=> Category::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
        if (isset($request->image) && $request->image->getClientOriginalName() )
        {
            $ext = $request->image->getClientOriginalExtension();
            $file= date('YmdHis').rand(1,9999).'.'.$ext;
            $request->image->storeAs('public/images',$file);        }
        else
        {
            if(! $category->image)
            {
                $file ="";
            }
            else
            {
                $file = $category->image;
            }
           
        }
        $category->name = $request->name;
        $category->image = $file;
        $category->descripsion=  $request->descripsion;
        $category->save();
        $notification = array(
            'message' => 'Đã cập nhật danh mục',
            'alert-type' => 'success'
        );
        return redirect()->route('adminCategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        DB::beginTransaction();
        try {
              if($request ->move_to_category !=null)
              {
               
                // $product = Product::where('category_id','=',$id)->get();
      
              }else
              {
                  //delete products
              }
            Category::destroy($id);
            DB::commit();
            $notification = array(
                'message' => 'Đã Xóa Danh Mục',
                'alert-type' => 'success'
            );
            return redirect()->route('adminCategory.index')->with($notification);
        } catch (Exception $e) {
            DB::rollBack();
        }
             
    }
    public function deleteForm (Request $request,$id)
    {
        return view('auth.admin.category.delete',[

            'id' => $id,
            'categories' => Category::where('id','!=',$id)->get()

            ]);
    }

}
