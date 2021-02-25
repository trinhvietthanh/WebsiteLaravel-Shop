@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            BẢNG DANH MỤC SẢN PHẨM
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">

          <a href="{{url('/add-category')}}" class="btn btn-sm btn-default">Thêm danh mục</a>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên danh mục</th>
              <th>Chuyên mục bao hàm</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $message =Session::get('message');
            if($message){
              echo '<span class="alert alert-success">'.$message.'</span>';
              Session::put('message',null);
            }
          ?>
            @foreach($all_category_product as $key => $cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_pro->name}}</td>
            <td>
              @if ($cate_pro->category_parent == 0)
                  <p>None</p>
              @else
                @foreach($all_category_product as $parent)
                  @if($parent->id == $cate_pro->category_parent)
                    <p>{{$parent->name}}</p>
                  @endif
                @endforeach
              @endif
              </td>

              <td>
                <a href="{{URL::to('/edit-category/'.$cate_pro->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm không?')" href="{{URL::to('/delete-category/'.$cate_pro->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">
            {{ $all_category_product->links() }}
          </div>
        </div>
      </footer>
    </div>
  </div>

@endsection
