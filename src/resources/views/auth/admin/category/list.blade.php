
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Quản Lý Danh Mục')

@section('content_header')
    <h1>Quản Lý Danh Mục</h1>
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
        <form action="{{route('adminCategory.index')}} " >
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
        <div class="card-tools">
        <a href="{{route('adminCategory.create')}}" class="btn btn-info" >Tạo Mới</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Tên Danh Mục</th>
              <th>Hình Ảnh</th>
              <th></th>
              <th style="width: 50px">Admin</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($categories as $category)
            <tr >
              <td>{{$category->id}}</td>
              <td >{{$category->name}}</td>
              <td >
              @if($category->image)
               <img src="{{asset('storage/images/'. $category->image)}}" style="width:150px;">
               @endif
               </td>
              <td >{{$category->descripsion}}</td>
              <td > 
               <a  href="{{route('adminCategory.edit',[$category->id])}}" class="btn btn-success" >Sửa</a>
               <a  href="{{route('deleteCategory',[$category->id])}}" class="btn btn-danger">Xoá</a>
               
               </td>
              

            </tr>
          @endforeach
          </tbody>
        </table>
                 <div  style="  display: flex;  justify-content: flex-end;">  {{$categories ->render()}}</div>
      
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
    <script> console.log('Hi!'); </script>
@stop

