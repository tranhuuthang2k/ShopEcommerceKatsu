
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
        <form action="{{route('adminSlider.index')}} " >
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
        <div class="card-tools">
        <a href="{{route('adminSlider.create')}}" class="btn btn-info" >Tạo Slider</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Tiêu Đề</th>
              <th>Mô Tả</th>
              <th>Hình Ảnh</th>
              <th></th>
              <th style="width: 50px">Admin</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sliders as $slider)
            <tr >
              <td>{{$slider->id}}</td>
              <td >{{$slider->title}}</td>
              <td >{{$slider->description}}</td>
              <td >
              @if($slider->image)
               <img src="{{asset('storage/images/'. $slider->image)}}" style="width:150px;">
               @endif
               </td>
              <td >{{$slider->descripsion}}</td>
              <td > 
               <a  href="{{route('adminSlider.edit',[$slider->id])}}" class="btn btn-success" >Sửa</a>
               
               <a  href="javascript:void()"  onclick="$(this).parent().find('form').submit()" class="btn btn-outline-danger" >Xoá</a>
             <form action="{{route('adminSlider.destroy',[$slider->id])}}" method="post">
                @method('DELETE')
                @csrf
             
             </form>
               </td>
              

            </tr>
          @endforeach
          </tbody>
        </table>
                 <div  style="  display: flex;  justify-content: flex-end;">  {{$sliders ->render()}}</div>
      
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

