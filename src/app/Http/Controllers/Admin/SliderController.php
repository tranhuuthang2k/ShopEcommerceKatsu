<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Slider;
class SliderController extends Controller
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
        $slider = Slider::where('title','like','%'. $key .'%')->paginate(3);
        return view('auth.admin.slider.List',['sliders'=> $slider]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.admin.slider.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, slider $slider)
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
        $slider->title = $request->title;
        $slider->image = $file;
        $slider->description=  $request->description;
        $slider->save();
        $notification = array(
            'message' => 'Đã tạo slider thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('adminSlider.index')->with($notification);
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
        return view('auth.admin.slider.Edit',['slider'=> Slider::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slider $slider )
    {
        //

        if ( isset($request->image) && $request->image->getClientOriginalName() ) // 
        {
            $ext = $request->image->getClientOriginalExtension();
            $file= date('YmdHis').rand(1,9999).'.'.$ext;
            $request->image->storeAs('public/images',$file);        }
        else
        {
            if(! $slider->image)
            {
                $file ="";
            }
            else
            {
                $file = $slider->image;
            }
           
        }
        $slider->title = $request->title;
        $slider->image = $file;
        $slider->description=  $request->description;
        $slider->save();
        $notification = array(
            'message' => 'Đã cập nhật danh mục',
            'alert-type' => 'success'
        );
        return redirect()->route('adminSlider.index')->with($notification);
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
        $Slider = Slider::findOrFail($id);
        Slider::destroy($id);
        $notification = array(
            'message' => 'Đã xóa  slider thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('adminSlider.index')->with($notification);
    }
    public function getslider()
    {
        return response()->json(Slider::get());
    }
}
