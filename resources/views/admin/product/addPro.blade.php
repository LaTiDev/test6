@extends('admin.master')

@section('title','Thêm mới Sản phẩm')


@section('main-content')
<section class="content">

  <!-- Default box -->
 <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm mới Sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            {{--  --}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group @error('name')has-error @enderror">
                  <label for="exampleInputEmail1">Tên Sản phẩm</label>
                  <input type="text" name="name" class="form-control" id="productName" onkeyup="ChangeToSlug()">
                  @error('name')
                    <span class="help-block">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group @error('name')has-error @enderror">
                  <label for="exampleInputEmail1">Đường dẫn Slug</label>
                  <input type="text" name="slug" class="form-control" id="slug">
                  
                  @error('name')
                    <span class="help-block">{{$message}}</span>
                  @enderror
                </div>
              </div>
            </div>
            {{--  --}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group @error('name')has-error @enderror">
                  <label for="exampleInputEmail1">Giá Sản phẩm</label>
                  <input type="number" name="price" class="form-control" id="exampleInputEmail1">
                  @error('name')
                    <span class="help-block">{{$message}}</span>
                  @enderror
                </div>
              </div>
              {{--  --}}
              <div class="col-md-6">
                <div class="form-group @error('name')has-error @enderror">
                  <label for="exampleInputEmail1">Giá Sản phẩm KM</label>
                  <input type="number" name="sale_price" class="form-control" id="exampleInputEmail1">
                  @error('name')
                    <span class="help-block">{{$message}}</span>
                  @enderror
                </div>
              </div>
              {{--  --}}
            </div>
            {{--  --}}
            <div class="form-group">
              <label for="exampleInputEmail1">Chọn Danh mục</label>
              <select name="category_id" id="input" class="form-control">
                
                {{categoryParent($categories)}}

              </select>
            </div>
            {{--  --}}
            <div class="form-group @error('name')has-error @enderror">
              <label for="exampleInputEmail1">Ảnh Sản phẩm</label>
              <input type="file" name="photo" class="form-control" id="exampleInputEmail1">
              
              @error('name')
                <span class="help-block">{{$message}}</span>
              @enderror
            </div>
            {{--  --}}
            <div class="form-group @error('name')has-error @enderror">
              <label for="exampleInputEmail1">Ảnh Mô tả</label>
              <input type="file" name="photos[]" class="form-control" id="exampleInputEmail1" multiple>
              
              @error('name')
                <span class="help-block">{{$message}}</span>
              @enderror
            </div>
            {{--  --}}
            <div class="form-group @error('name')has-error @enderror">
              <label for="exampleInputEmail1">Mô tả Sản phẩm  </label>
              <textarea name="description" id="editor1" cols="80" rows="10">
                Chi tiết sản phẩm được mô tả tại đây
              </textarea>
            </div>
            {{--  --}}
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



@section('custom-js') 
<script src="{{asset('assets\ckeditor\ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('editor1');
</script>
<script language="javascript">
  function ChangeToSlug()
  {
      var productName , slug;

      //Lấy text từ thẻ input title 
      productName = document.getElementById("productName").value;

      //Đổi chữ hoa thành chữ thường
      slug = productName.toLowerCase();

      //Đổi ký tự có dấu thành không dấu
      slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
      slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
      slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
      slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
      slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
      slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
      slug = slug.replace(/đ/gi, 'd');
      //Xóa các ký tự đặt biệt
      slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
      //Đổi khoảng trắng thành ký tự gạch ngang
      slug = slug.replace(/ /gi, "-");
      //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
      //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
      slug = slug.replace(/\-\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-/gi, '-');
      slug = slug.replace(/\-\-/gi, '-');
      //Xóa các ký tự gạch ngang ở đầu và cuối
      slug = '@' + slug + '@';
      slug = slug.replace(/\@\-|\-\@|\@/gi, '');
      //In slug ra textbox có id “slug”
      document.getElementById('slug').value = slug;
  }
</script>
@endsection