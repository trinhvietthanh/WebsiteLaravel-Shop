@extends('admin_layout')
@section('title')
    <title>Tất cả các hóa đơn</title>
@endsection
@section('admin_content')
<style>
  span{
    font-weight: 500;
  }
  </style>
<div class="container" >
  <div style="    background: antiquewhite; height:500px">
    <h2 class="text-center" style="padding: 50px;">HÓA ĐƠN ĐƠN HÀNG MÃ {{$bill->id}}</h2>
    <div class="col-sm-12">
    <div class="col-sm-6">
      <span for="name">Tên người nhận:</span>
    <p name="name">{{$bill->detailBill->name}}</p>
      <span for="phone">Số điện thoại:</span>
      <p name="phone">{{$bill->detailBill->phone}}</p>
      <span for="address">Địa chỉ:</span>
      <p name="address">{{$bill->detailBill->address}}</p>
    </div>
    <div class="col-sm-6">
      <span for="product">Mặt hàng: </span>
    <p name="product">@foreach($bill->products as $product)
        {{$product->name}}
      @endforeach
    </p>
      <span for="method">Phương thức thanh toán: </span>
  <p name="method">{{$bill->detailBill->method}}</p>
      <span for="ship">Phí vận chuyển: </span>
  <p name="ship">0 đ</p>

    </div>
    
  </div>
  <div class="col-sm-6">
      
  </div>
  <div class="col-sm-6">
    <h3 for="total">Tổng hóa đơn: </h3>
    <h4 name="total">{{$bill->don_gia}} đ</h4>
        <h3 for="fee">Đã thanh toán: </h3>
    <h4 name="fee">{{$bill->da_thanh_toan}}%</h4>
  </div>
   
  </div>
</div>
@endsection