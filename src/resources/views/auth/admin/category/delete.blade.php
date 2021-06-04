
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'XOÁ Danh Mục')

@section('content_header')
    <h1>XOÁ Danh Mục</h1>
@stop

@section('content')
<div class="col-md-12">
            <div class="card">
                 <div class="card-body p-0">
           
                 <form role="form" method="post" action="{{route('adminCategory.destroy',[$id])}}">
                 {{csrf_field()}}
                 {{ method_field('DELETE') }}
                     <div class="card-body">
                        <select name="move_to_category" id="">
                         <option value="">
                           Không Di chuyển
                        </option>
                        @foreach ( $categories as  $category)
                        <option value=" {{$category->id}}">
                            {{$category->name}}
                        </option>
                        @endforeach
                        </select>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">XOÁ</button>
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

