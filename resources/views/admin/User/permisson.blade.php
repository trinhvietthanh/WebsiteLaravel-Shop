@extends('admin_layout')
@section('admin_content')
<div class="col-sm-12">
<div class="col-sm-6">
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            DANH SÁCH CHỨC NĂNG
      </div>
      <div class="row w3-res-tb">

        <div class="col-sm-6">
          <form name="role">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Tên chức năng">
            <span class="input-group-btn">
              <a type="submit" class="btn btn-sm btn-default" type="button">Thêm</button>
            </span>
          </div>
        </form>
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
              <th>Mã chức năng</th>
              <th>Tên Chức năng</th>
              <th>Quyền hạn</th>>
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
            @foreach($roles as $role)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="role[]"><i></i></label></td>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td>@foreach($role->permissions as $permission)
                          {{$permission->display_name}}
                          <br />
                      @endforeach
                  </td>
              <td>
                <a href="{{URL::to('/edit-userduct/'.$role->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm không?')" href="{{URL::to('/delete-role/'.$role->id)}}" class="active styling edit" ui-toggle-class="">
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

              {{$roles->links()}}


          </div>
        </div>
      </footer>
    </div>
  </div>
</div>
<div class="col-sm-6">
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            DANH SÁCH QUYỀN HẠN
      </div>
      <div class="row w3-res-tb">

        <div class="col-sm-6">
          <form name="role">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Tên chức năng">
            <span class="input-group-btn">
              <a type="submit" class="btn btn-sm btn-default" type="button">Thêm</a>
            </span>
          </div>
        </form>
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
              <th>Mã quyền hạn</th>
              <th>Tên quyền hạn</th>

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
            @foreach($permissions as $permission)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>

              <td>
                <a href="{{URL::to('/edit-userduct/'.$permission->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm không?')" href="{{URL::to('/delete-userduct/'.$permission->id)}}" class="active styling edit" ui-toggle-class="">
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

              {{$permissions->links()}}

            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>
</div>
<div class="col-sm-12">
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            QUYỀN HẠN CHỨC NĂNG
      </div>
      <div class="row w3-res-tb">

        <div class="col-sm-6">
          <form name="role">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Tên chức năng">
            <span class="input-group-btn">
              <a type="submit" class="btn btn-sm btn-default" type="button">Thêm</a>
            </span>
          </div>
        </form>
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

              <th>Tên chức năng</th>
              <th>Tên quyền hạn</th>
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
            @foreach($permissions as $permission)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>

              <td>
                <a href="{{URL::to('/edit-userduct/'.$permission->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm không?')" href="{{URL::to('/delete-userduct/'.$permission->id)}}" class="active styling edit" ui-toggle-class="">
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

              {{$permissions->links()}}

            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>
<script>
      $('.pagination a').unbind('click').on('click', function(e) {
             e.preventDefault();
             var page = $(this).attr('href').split('page=')[1];
             getPosts(page);
       });

       function getPosts(page)
       {
            $.ajax({
                 type: "GET",
                 url: '?page='+ page
            })
            .success(function(data) {
                 $('body').html(data);
            });
       }
    </script>
@endsection
