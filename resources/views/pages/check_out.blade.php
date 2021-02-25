@extends('layouts.layout_checkout')
@section('content')
<style>
    .use1{
    background: #F0F0E9;
    border: 0 none;
    margin-bottom: 10px;
    padding: 10px;
    width: 100%;
    font-weight: 300;
    width: 200px;
    }
    </style>
<section id="cart_items">
    <form name="form-address" method="POST"  action="{{url('/save-check-out')}}">
            <div class="register-req">
                <p>THANH TOÁN</p>
            </div><!--/register-req-->
            <?php
            $content = Cart::content();

            ?>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>ĐỊA CHỈ GIAO HÀNG</p>
                            <div class="form-one" style="">
								
									<input class="use1" type="text" name="name" placeholder="Họ và tên người nhận">
                                    <input class="use1" type="text" name="phone" placeholder="Số điện thoại">
                                    <input  class="use1" type="text" name="address" placeholder="Địa chỉ">
                                    <input class="use1" type="email" name="email" placeholder="Email">
                            
								
							</div>
                                
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Ghi chú đơn hàng</p>
                            <textarea name="note"  placeholder="Ghi chú cho đơn hàng" rows="16"></textarea>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Thông tin hóa đơn</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sp</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('storage/app/'.$v_content->options->image)}}" width="90" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
						
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).'đ'}}</p>
								<p style="color: #bfbfbf!important;
								text-decoration: line-through;
								font-size: 0.95em;">{{number_format($v_content->weight).'đ'}} </p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<p class="cart_quantity_input" name="cart_quantity"  >{{$v_content->qty}}</p>
									
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">

									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).'đ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
            </div>
            <section id="do_action">
                <div class="container">
        
                    <div class="row">
        
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>Tổng <span>{{Cart::total().' '.'đ'}}</span></li>
                                    <li>Thuế <span>{{Cart::tax().' '.'đ'}}</span></li>
                                    <li>Phí vận chuyển <span>Free</span></li>
                                    <li>Thành tiền <span>{{Cart::total().' '.'đ'}}</span></li>
                                </ul>
        
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="payment-options">
                            <h2>Lựa chọn hình thức thanh toán</h2>
                            <div style="display: grid;">
                                <span>
                                    <label><input type="radio" name="method" value="0">Thanh toán bằng tiền mặt</label>
                                </span>
                                <span>
                                    <label><input type="radio" name="method" value="1"> Thanh toán bằng visa</label>
                                </span>
                                <span>
                                    <label><input type="radio" name="method" value="2">  Thanh toán bằng thẻ ngân hàng</label>
                                </span>
                                <input class="btn btn-success" type="submit" value="Đặt hàng">
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </section><!--/#do_action-->
        
           
    </form>
    
    </section> <!--/#cart_items-->

@endsection
