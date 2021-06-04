
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tạo Danh Mục')

@section('content_header')
    <h1>Tạo Danh Mục</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('adminCategory.store')}}" enctype="multipart/form-data">
                 {{csrf_field()}}
                     <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Tên Danh Mục</label>
                    <input name="name" type="text"  class="form-control" id="inputName" placeholder="Nhập Tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div> <input name="image"  type="file"  ></div>
                    
                  </div>
                  <div class="form-group">
                    <label for="descripsion">Mô Tả Danh Mục </label>
                    <input name="descripsion"  type="text"  class="form-control" id="descripsion" placeholder="Nhập Mô Tả Danh mục ">
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

