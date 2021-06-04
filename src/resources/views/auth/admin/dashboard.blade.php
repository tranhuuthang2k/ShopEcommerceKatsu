
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Thống Kê')

@section('content_header')
    <h1>Thống Kê</h1>
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
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @if($countProducts)
                <h3>{{$countProducts}}</h3>
              @endif
                <p>Sản Phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              @if($count_Categories)
                <h3>{{$count_Categories}}</h3>
              @endif
                <p>Danh Mục</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              @if($count_Users)
                <h3>{{$count_Users}}</h3>
              @endif
                <p>Thành Viên Đăng Ký</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
   
               <h3>{{$count_customerOrders  }}</h3>
                <p>Đơn Hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
 <!-- /.card-header -->
 <h2>Danh Sách Đặt Hàng</h2>
 <div class="card-body p-0">
        <table class="table">
        
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Tên Khách Hàng </th>
              <th>Địa chỉ </th>
              <th>Gmail </th>
              <th>Số ĐT</th>
              <th>Đơn Hàng</th>
              <th> Tổng Tiền </th>
              <th style="width: 50px">Admin</th>
             
            </tr>
          </thead>
          <tbody>
          @foreach($customerOrders as $customer)
            <tr >
              <td>{{$customer->id}} </td>
              <td>{{$customer->name}}</td>
              <td>{{$customer->address}}</td>
              <td>{{$customer->gmail}}</td>
              <td >{{$customer->phone}}</td>
              @if(count(json_decode($customer->productOrders)) >=2)
                   
                     <td >
                     <?php $total =0 ?>
                     @foreach (json_decode($customer->productOrders) as $value)
                          <?php
                              $total =  $total +$value->price * $value->quality
                          ?>

                       {{ $value->name}}-> SL: {{$value->quality }} 
                       ->Tiền : {{ $value->price * $value->quality }}
                     
                       </br>     
                     @endforeach
                     </td>
                     <td>{{number_format($total)}} VNĐ</td>
              @endif
              @if(count(json_decode($customer->productOrders)) == 1)
                     <?php $total =0 ?>
                   @foreach (json_decode($customer->productOrders) as $value) 
                           <?php
                              $total =  $total +$value->price * $value->quality
                           ?>
                       <td >
                       {{ $value->name}} ->SL: {{$value->quality }}
                       ->Tiền : {{ $value->price * $value->quality }}    
                       </td>                  
                   @endforeach
                   <td>{{number_format($total)}} VNĐ</td>
              @endif
      
             


             
              <td >  
               <a  href=" {{route('DeleteCustomerOrder',[$customer->id])}} "  onclick="return confirm('Bạn muốn xóa đơn hàng này không ?');"  class="btn btn-danger" >Xoá</a>
               
               </td>
         
            
           </tr>
           @endforeach 
           <tbody>
           </table> 
     
</div>
<div  style="  display: flex;  justify-content: flex-end;">{{$customerOrders->render()}}</div>
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

