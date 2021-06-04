
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sửa Sản phẩm')

@section('content_header')
    <h1>Sửa Sản phẩm</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('adminSlider.update',[$slider->id])}} " enctype="multipart/form-data">
                 {{csrf_field()}}
                 {{ method_field('PUT') }}
                     <div class="card-body">
                     <div class="form-group">
                    <label for="title">Tên Sản Phẩm</label>
                    <input name="title" type="text"  class="form-control" id="title" placeholder="Nhập Tên danh mục"  value="{{$slider->title}}">
                     </div>
                     <div class="form-group">
                    <label for="description">Giá Sản Phẩm</label>
                    <input name="description" type="text"  class="form-control" id="description" placeholder="Nhập Tên danh mục"  value="{{$slider->description}}">
                     </div>


                   @if($slider->image)
                     <div class="form-group">
                     <label for="inputName">Hình ảnh</label>
                    <div><input name="image"  type="file"  id="image" ></div>
                     <img src="{{asset('storage/images/'. $slider->image)}}" style="width:250px;">  
                     
                     </div>
                  @endif
    
                   
                   
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" style="margin-top: -18px;">
                  <button type="submit" class="btn btn-primary">Update </button>
                </div>
              </form>
              
                 </div>
            </div>
            <!-- /.card -->
<div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

