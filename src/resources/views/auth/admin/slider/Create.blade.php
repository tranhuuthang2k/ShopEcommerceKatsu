
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tạo Slider')

@section('content_header')
    <h1>Tạo Slider</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('adminSlider.store')}}" enctype="multipart/form-data">
                 {{csrf_field()}}
                     <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text"  class="form-control" id="title" placeholder="Nhập Tiêu Đề">
                  </div>
                  <div class="form-group">
                    <label for="description">Nhập Mô tả</label>
                    <input name="description" type="text"  class="form-control" id="description" placeholder="Nhập Mô Tả ">
                  </div>
                  <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <div> <input name="image"  type="file"  ></div>
                    
                  </div>

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

