@extends('admin_layout')
@section('title')
    <title>Tất cả các hóa đơn</title>
@endsection
@section('admin_content')
<div class="table-responsive">
  <table class="table table-striped b-t b-light">
    <thead>
      <tr>
      
        <th>Mã đơn hàng</th>
        <th>Ngày mua</th>
        <th>Sản phẩm</th>
        <th>Tổng tiền</th>
        <th>Trạng thái đơn hàng</th>
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
      @foreach($bills as $key => $bill)
      <tr>
            <td>{{$bill->id}}</td>
            <td>{{$bill->created_at}}</td>
            <td>@foreach($bill->products as $product)
                  {{$product->name}},
                @endforeach
            </td>
            <td>{{$bill->don_gia}}</td>
            <td>@if($bill->detailBill->status == '0')
            <a href="/admin/chot-don/{{$bill->id}}" class="btn btn-warning">Đang chờ xử lý</a>
                @elseif($bill->detailBill->status == '1')
                <a class="btn btn-primary" href="/admin/thanh-toan/{{$bill->id}}">Đang giao hàng</a>
                @else 
                <a class="btn btn-danger">Đã giao hàng</a>
                @endif
            </td>
            <td>
              <a href="{{URL::to('/detail-bill/'.$bill->id)}}" class="active styling edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc chắn xóa hóa đơn mã {{$bill->id}} không?')" href="/delete-bill/{{$bill->id}}" class="active styling edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>

      </tr>
     @endforeach
    </tbody>
  </table>
</div>
@endsection