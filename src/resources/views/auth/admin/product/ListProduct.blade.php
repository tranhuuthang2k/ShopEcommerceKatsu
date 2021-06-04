
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Quản Lý Sản Phẩm')

@section('content_header')
    <h1>Quản Lý Sản Phẩm</h1>
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   

</head>
<body>
<div class="col-md-12">
    
    <div class="card">
      <div class="card-header">

      <div class="search-container">
        <form action="{{route('product.index')}}">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
        <div class="card-tools">
        <a href="{{route('product.create')}}" class="btn btn-outline-info" >Tạo Mới</a>
          <!-- <ul class="pagination pagination-sm float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul> -->
        </div>
      </div>
      <!-- /.card-header -->

      
      <div class="card-body p-0">
      <table class="table">
        
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Tên Sản phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th >Hình Ảnh</th>
            <th style="width: 200px ">Mô Tả</th>
            <th>Danh Mục</th>
            <th style="width: 10%;">Người Đăng</th>
            <th style="width: 50px">Admin</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($products as $product)
          <tr >
            <td>{{$product->id}}</td>
            <td >{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>  
             @if($product->image)
               <img src="{{asset('storage/products/'. $product->image)}}" style="max-width:150px;">
             @endif 
             </td>
            <td >{{$product->descripsion}}</td>
            @if($product->category->name)
            <td>
           {{$product->category->name}}
            </td>
            @endif
         

          @if($product->user->name)
          <td>
               {{$product->user->name}}
          </td>
          @endif



            <td  > 
             <a  href="{{route('product.edit',[$product->id])}}"  class="btn btn-outline-success" >Sửa</a>
             <a  href="javascript:void()"  onclick="$(this).parent().find('form').submit()" class="btn btn-outline-danger" >Xoá</a>
             <form action="{{route('product.destroy',[$product->id])}}" method="post">
                @method('DELETE')
                @csrf
             
             </form>
             </td>
            

          </tr>
        @endforeach
    


        </tbody>
        
      </table>
      <div  style="  display: flex;  justify-content: flex-end;">    {{$products ->render()}}</div>            

</body>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

  @if(Session::has('message'))
       var type="{{Session::get('alert-type','info')}}"
       switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}

	@endif
</script>

</html>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); 
    
    
    </script>
    
@stop

