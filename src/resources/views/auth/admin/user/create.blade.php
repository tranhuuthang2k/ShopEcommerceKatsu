
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Thêm mới User')

@section('content_header')
    <h1>Thêm mới User</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('storeUser')}}" enctype="multipart/form-data">
                 {{csrf_field()}}
                     <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Họ Và Tên</label>
                    <input name="name" type="text"  class="form-control" id="inputName" placeholder="Nhập Họ Tên">
                  </div>
                  <div class="form-group">
                    <label for="email">Tài Khoản email</label>
                    <input name="email" type="text"  class="form-control" id="email" placeholder="Nhập Tài khoản ">
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input name="password" type="text"  class="form-control" id="password" placeholder="Nhập Mật Khẩu">
                  </div>
                  <div class="form-group">
                  <label for="role_id">chọn Quyền :</label>

                  <select name="role_id">
                    <option value="1" >User</option>
                    <option value="2" >Admin</option>
                    </select>
                  </div>
               
                 


                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
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

