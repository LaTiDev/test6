@extends('admin.master')
@section('main-content')
@section('title','Thêm mới Danh mục')

<section class="content">

    <!-- Default box -->
   <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm mới danh mục</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="box-body">
              <div class="form-group @error('name')has-error @enderror">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                
                @error('name')
                  <span class="help-block">{{$message}}</span>
                @enderror
              </div>
              {{--  --}}
              <div class="form-group">
                <label for="exampleInputEmail1">Chọn Menu Cha</label>
                <select name="parent_id" id="input" class="form-control">
                  <option value="0">Chọn Menu cha</option>
                  
                  {{categoryParent($categories)}}

                </select>
              </div>
              {{--  --}}
              <div class="form-group">
                <label for="exampleInputEmail1">Chọn trạng thái</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="status" id="input" value="1" checked="checked">
                    On
                  </label>
                  <label>
                    <input type="radio" name="status" id="input" value="0" >
                    Off
                  </label>
                </div>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
          </form>
        </div>
     
        <!-- /.box -->

      </div>
    <!-- /.box -->

  </section>

@endsection