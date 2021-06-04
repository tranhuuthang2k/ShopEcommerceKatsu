
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Đổi Mật Khẩu')

@section('content_header')
    <h1>Đổi Mật Khẩu</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('storePassword')}}" enctype="multipart/form-data">
                 {{csrf_field()}}
                <div class="card-body">
                 
                  
                  
                  <div class="form-group">
                    <label for="currentpassword">Mật Khẩu cũ </label>
                    <input name="currentpassword" type="password"  class="form-control" id="currentpassword" placeholder="Nhập Mật Khẩu Hiện Tại">
                  </div>
                  <div class="form-group">
                    <label for="newpassword">Nhập Mật Khẩu mới </label>
                    <input name="newpassword" type="text"  class="form-control" id="newpassword" placeholder="Nhập Mật Khẩu Mới">
                  </div>
                  <div class="form-group">
                    <label for="confirmpassword">Xác nhận mật khẩu </label>
                    <input name="confirmpassword" type="text"  class="form-control" id="confirmpassword" placeholder="Xác nhận Mật Khẩu ">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
              </form>
              @if(session()->has('success'))
                 <div class="alert alert-success">
                  {{ session()->get('success') }}
                 </div>
                      @endif
                 </div>
                 @if(session()->has('error'))
                 <div class="alert alert-danger">
                  {{ session()->get('error') }}
                 </div>
                      @endif
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

