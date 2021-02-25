@extends('layout')
@section('content')
                    <div class="features_items"><!--features_items-->
                       
                    <h2 class="title text-center">{{$selectCate->name}}</h2>
                      
						@foreach ($selectCate->products as $key => $prod)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									
										<div class="productinfo text-center">
										<a href="{{url('/chi-tiet/'.$prod->id)}}"><img src="storage/app/{{$prod->photo}}" alt="" /></a>
										<h2>{{number_format($prod->price).'đ'}}</h2>
											<p>{{$prod->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<!--features_items-->
                   
                   
@endsection