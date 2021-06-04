
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Quản Lý User')

@section('content_header')
    <h1> Quản Lý User</h1>
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
        <form action="{{route('ShowListUser')}}">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
        <div class="card-tools">
        <a href="{{route('createUser')}}" class="btn btn-primary" >Thêm Thành Viên</a>
        </div>
      </div>

 
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
        
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Họ Tên </th>
              <th>Tài Khoản </th>
              <th>Mật Khẩu Mã Hóa </th>
              <th>Quyền</th>
              <th>Trạng Thái</th>
              <th style="width: 50px">Admin</th>
             
            </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)
         
            <tr >
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td >{{$user->email}}</td>
              <td > 
              @if($user->password)
              
              <span>********</span>
              @endif
               </td>
              @if($user->role_id == 1)
              <td>User</td>
              @endif
              @if($user->role_id == 2)
              <td>Admin</td>
              @endif


              @if($user->isUserOnline())
              <td style="color: red">
                  <span>ONLINE</span>
              </td>
              @else
              <td>
                  <span>OFFLINE</span>
              </td>
              @endif



              <td >  
               <a  href="{{route('EditUser',[$user->id])}}" class="btn btn-success" >Sửa</a>
               <a  href=" {{route('DeleteUser',[$user->id])}} "  onclick="return confirm('Bạn có muốn xóa user ?');"  class="btn btn-danger" >Xoá</a>
               
               </td>
         

            </tr>
          @endforeach
          </tbody>
        </table>
        <div  style="  display: flex;  justify-content: flex-end;">{{$users ->render()}}</div>
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

