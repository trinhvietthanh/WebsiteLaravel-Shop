@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            BẢNG DANH SÁCH CÁC TÁC GIẢ
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
              <th>Tên tác giả</th>
              <th>Chân dung tác giả</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $message =Session::get('message');
            if($message){
              echo '<span class="alert alert-warning">'.$message.'</span>';
              Session::put('message',null);
            }
          ?>
            @foreach($all_author as $key => $cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_pro->name}}</td>
              <td><span class="text-ellipsis">

                {{$cate_pro->image}}
              </span></td>

              <td>
                <a href="{{URL::to('/edit-author/'.$cate_pro->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn xóa tác giả không?')" href="{{URL::to('/delete-author/'.$cate_pro->id)}}" class="active styling edit" ui-toggle-class="">
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
            {{$all_author->links()}}
          </div>
        </div>
      </footer>
    </div>
  </div>

@endsection
