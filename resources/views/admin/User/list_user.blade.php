@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            DANH SÁCH NGƯỜI DÙNG
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
              <th>Tên người dùng</th>
              <th>SĐT</th>
              <th>Địa chỉ</th>
              <th>Giới tính</th>
              <th>Chức vụ</th>
              <th>Ngày khởi tạo</th>
              <th>Truy cập gần nhất</th>
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
            @foreach($users as $user)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->phone_number}}</td>
                  <td>{{$user->address}}</td>
                  <td>@if($user->sex == 0)
                        Nam
                      @else
                        Nữ
                      @endif
                  </td>
                  <td>{{$user->role->name}}</td>
                  <td>{{$user->created_at}}
                  </td>
                  <td>{{$user->updated_at}}</td>

              <td>
                <a href="{{URL::to('/edit-userduct/'.$user->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm không?')" href="{{URL::to('/delete-userduct/'.$user->id)}}" class="active styling edit" ui-toggle-class="">
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
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              {{$users->links()}}
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
<script src="js/app.js"></script>
@endsection
