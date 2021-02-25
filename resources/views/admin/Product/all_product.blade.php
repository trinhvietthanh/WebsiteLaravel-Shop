@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            BẢNG DANH MỤC SẢN PHẨM
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>
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
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Giảm giá</th>
              <th>Tồn kho</th>
              <th>Hình ảnh</th>
              <th>Danh mục</th>
              <th>Tác giả</th>

              <th>Hiện thị</th>
              <th>Ngày đăng<th>
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
            @foreach($product as $key => $pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$pro->name}}</td>
                  <td>{{$pro->price}}</td>
                  <td>@if($pro->discount)
                      {{$pro->disconut}}
                      @else
                      <p>0</p>
                      @endif
                  </td>
                  <td>{{$pro->detailProduct->stock}}</td>
                  <td><img src="storage/app/{{$pro->photo}}" width="100" height="100"></td>
                  <td>@foreach($pro->categories as $category)

                      {{$category->name}}
                      @endforeach
                  </td>
                  <td>{{$pro->author->name}}</td>

              <td><span class="text-ellipsis">
                <?php
                if($pro->product_status==1){
                 ?>
                 <a onclick="onChange()"><span class="fa-thumbs-style fa fa-eye"></span></a>
                 <?php
                  }else{
                 ?>
                  <a onclick="onChange()"><span class="fa-thumbs-style fa fa-eye-slash"></span></a>
                 <?php
                }
               ?>

            </span></td>
            <td>{{$pro->created_at}}</td>

              <td>
                <a href="{{URL::to('/edit-product/'.$pro->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm không?')" href="{{URL::to('/delete-product/'.$pro->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">

          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              {{$product->links()}}
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
<script src="js/app.js"></script>
@endsection
