
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
           
                 <form role="form" method="post" action="{{route('product.update',[$product->id])}} " enctype="multipart/form-data">
                 {{csrf_field()}}
                 {{ method_field('PUT') }}
                     <div class="card-body">
                     <div class="form-group">
                    <label for="inputName">Tên Sản Phẩm</label>
                    <input name="name" type="text"  class="form-control" id="inputName" placeholder="Nhập Tên danh mục"  value="{{$product->name}}">
                     </div>
                     <div class="form-group">
                    <label for="inputName">Giá Sản Phẩm</label>
                    <input name="price" type="text"  class="form-control" id="inputName" placeholder="Nhập Tên danh mục"  value="{{$product->price}}">
                     </div>


                   @if($product->image)
                     <div class="form-group">
                     <label for="inputName">Hình ảnh</label>
                    <div><input name="image"  type="file"  id="image" ></div>
                     <img src="{{asset('storage/products/'. $product->image)}}" style="width:250px;">  
                     
                     </div>
                  @endif
                   


                    <div class="form-group">
                    <label for="descripsion">Mô Tả sản phẩm</label>
                    <input name="descripsion"  type="text"  class="form-control" id="descripsion" placeholder="Mô Tả Sản phẩm "  value="{{$product->descripsion}}">
                    </div>
                    <div> 
                   
                    <div class="form-group">
                    <label for="category_id">Chọn danh mục :</label>
                     
                    <select name="category_id">
                     @foreach($categories as $category)
                      <option value="{{$category->id}}" >{{$category->name}}</option>
                      @endforeach
                      </select>
                      
                    </div>

               
                    @if($roles->role_id == 2) 
                      <div class="form-group" >
                            
                          <label for="hot-product">Sản Phẩm HOT</label>
                            @if ( $product->show_on_home == 1)
                              <input type="checkbox" id="hot-product" name="show_on_home" value = "1"  checked/>
                            @elseif ( ( $product->show_on_home == 0))
                            <input type="checkbox" id="hot-product" name="show_on_home" value = "1"  />  
                             @endif
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

