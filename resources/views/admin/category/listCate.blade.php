@extends('admin.master')
@section('main-content')
@section('title','TEST6 | Danh mục')
<section class="content">

    <!-- Default box -->
    <div class="col-xs-12">
      <h1 class="text-center">Danh sách danh mục</h1>
        <div class="box">
          <div class="box-header">
         <a href="{{route('category.create')}}" class="btn btn-success">Thêm mới Danh mục</a>
         <a href="{{route('category.trash')}}" class="btn btn-danger"><i class="fa fa-trash"></i> Thùng rác</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                  <strong>{{$message}}</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-success" role="alert">
                  <strong>{{$message}}</strong>
                </div>
            @endif

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover text-center">
              <tbody>
                <tr class="text-center">
                  <th>STT</th>
                  <th>Tên danh mục</th>
                  <th>Danh mục cha</th>
                  <th>Trạng thái</th>
                  <th></th>
                </tr>
                @forelse ($categories as $item)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->parent->name ?? 'NULL'}}</td>

                    <td>{!!$item->status ? '<span class="label label-success">On</span>' : '<span class="label label-danger">Off</span>'!!}</td>
                    <td>
                      <a href="{{route('category.edit',$item)}}" class="btn btn-success">Sửa</a>
                    </td>
                    <td>
                      <form action="{{route('category.destroy',$item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Xóa</button>
                      </form>
                    </td>
                  </tr>
                @empty
                
                    <span class="text-danger p-2">Chưa có chi hết</span>
                @endforelse
            </tbody></table>
          </div>
          
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection