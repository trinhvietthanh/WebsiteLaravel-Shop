@extends('layouts.layout_checkout')
@section('content')

<div class="table-responsive" style="color: black;">
  <table class="table table-striped b-t b-light" >
    <thead>
      <tr>
      
        <th>Mã đơn hàng</th>
        <th>Ngày mua</th>
        <th>Sản phẩm</th>
        <th>Tổng tiền</th>
        <th>Trạng thái đơn hàng</th>
        
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
                Đang chờ xử lý
                @elseif($bill->detailBill->status == '1')
                <p>Đang giao hàng</p>
                @else 
                Đã giao hàng
                @endif
            </td>
            
          
    
          
  

      </tr>
     @endforeach
    </tbody>
  </table>
</div>
@endsection