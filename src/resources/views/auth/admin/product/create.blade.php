
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tạo Sản Phẩm')

@section('content_header')
    <h1>Tạo Sản Phẩm</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                 {{csrf_field()}}
                     <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Tên Sản Phẩm</label>
                    <input name="name" type="text"  class="form-control" id="inputName" placeholder="Nhập Tên Sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="inputPrice">Giá sản phẩm</label>
                    <input name="price" type="text"  class="form-control" id="inputPrice" placeholder="Nhập Giá Sản phẩm ">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div> <input name="image"  type="file"  ></div>
                    
                  </div>
                  <div class="form-group">
                    <label for="descripsion">Mô Tả sản phẩm</label>
                    <input name="descripsion"  type="text"  class="form-control" id="descripsion" placeholder="Mô Tả Sản phẩm ">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Chọn danh mục :</label>
                     
                    <select name="category_id">
                     @foreach($categories as $category)
                      <option value="{{$category->id}}" >{{$category->name}}</option>
                      @endforeach
                      </select>
                  </div>
                 
                 
                   @if ($roles->role_id == 2)
                        <div class="form-group">
                            <label for="hot-product">Sản Phẩm HOT</label> 
                            <input type="checkbox" id="hot-product" name="show_on_home" value = "1" />
                  
                        </div>
                      @endif
             
     
                      </div>
                </div>
                <div class="card-footer" style="margin-top:-18px;">
                  <button type="submit" class="btn btn-primary">Submit</button>
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

