
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sửa Danh Mục')

@section('content_header')
    <h1>Sửa Danh Mục</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('adminCategory.update',[$category->id])}} " enctype="multipart/form-data">
                 {{csrf_field()}}
                 {{ method_field('PUT') }}
                     <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Tên Danh Mục</label>
                    <input name="name" type="text"  class="form-control" id="inputName" placeholder="Nhập Tên danh mục"  value="{{$category->name}}">
                     </div>
                   @if($category->image)
                     <div class="form-group">
                     <label for="inputName">Hình ảnh</label>
                    <div><input name="image"  type="file"  id="image" ></div>
                     <img src="{{asset('storage/images/'. $category->image)}}" style="width:250px;">  
                     
                     </div>
                  @endif



                    <div class="form-group">
                    <label for="descripsion">Mô Tả sản phẩm</label>
                    <input name="descripsion"  type="text"  class="form-control" id="descripsion" placeholder="Mô Tả Sản phẩm "  value="{{$category->descripsion}}">
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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

