@extends('admin.master')
@section('main-content')
@section('title','TEST6 | Sản phẩm')
<section class="content">

    <!-- Default box -->
    <div class="col-xs-12">
      <h1 class="text-center">Danh sách Sản phẩm</h1>
        <div class="box">
          <div class="box-header">
         {{-- <a href="{{route('category.trash')}}" class="btn btn-danger"><i class="fa fa-trash"></i> Thùng rác</a> --}}

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
                  <th>Tên Sản phẩm</th>
                  <th>Giá Sản phẩm</th>
                  <th>Giá KM</th>
                  <th>Ảnh</th>
                  <th>Danh mục</th>
                  <th></th>
                </tr>
                @forelse ($products as $item)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->sale_price}}</td>
                    <td><img src="{{asset('storage/images')}}/{{$item->image}}" width="100px" alt=""></td>
                    <td>{{$item->category->name}}</td>
                    {{-- <td>
                      <a href="{{route('product.edit',$item)}}" class="btn btn-success">Sửa</a>
                    </td>
                    <td>
                      <form action="{{route('product.destroy',$item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Xóa</button>
                      </form>
                    </td> --}}
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