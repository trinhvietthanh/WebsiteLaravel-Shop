@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Mới phát hành</h2>
						@foreach ($product as $key => $prod)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									
										<div class="productinfo text-center">
											<a href="{{url('/chi-tiet/'.$prod->product_id)}}"><img src="{{URL::to('public/upload/'.$prod->product_image)}}" alt="" /></a>
										<h2>{{number_format($prod->product_price).'đ'}}</h2>
											<p>{{$prod->product_name}}</p>
											<form action="{{url('/save-cart')}}" method="POST">
												{{ csrf_field() }}
											<span>
											
												<input name="qty" type="hidden" value="1" />
											<input name="product_hidden" type="hidden"  value="{{$prod->product_id}}"  />
												<button type="submit" class="btn btn-fefault cart">
													<i class="fa fa-shopping-cart"></i>
													Thêm vào giỏ hàng
												</button>
											</span>
											</form>
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
                    <div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Tiểu thuyết</a></li>
								<li><a href="#blazers" data-toggle="tab">Kinh tế</a></li>
								<li><a href="#sunglass" data-toggle="tab">Văn học Việt Nam</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								@foreach($l_product as $key=>$value)	
								@if ($value->category_id =="10")
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="{{url('/chi-tiet/'.$value->product_id)}}"><img src="{{url('public/upload/'.$value->product_image)}}" alt="" /></a>
												<h2>{{number_format($value->product_price).'đ'}}</h2>
												<p>{{$value->product_name}}</p>
												<form action="{{url('/save-cart')}}" method="POST">
													{{ csrf_field() }}
												<span>
												
													<input name="qty" type="hidden" value="1" />
												<input name="product_hidden" type="hidden"  value="{{$value->product_id}}"  />
													<button type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm vào giỏ hàng
													</button>
												</span>
												</form>
											</div>
											
										</div>
									</div>
								</div>
								@endif				
								
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="blazers" >
								
								
								@foreach($l_product as $key=>$value)	
								@if ($value->category_id =="9")
								
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="{{url('/chi-tiet/'.$value->product_id)}}"><img src="{{url('public/upload/'.$value->product_image)}}" alt="" /></a>
												<h2>{{number_format($value->product_price).'đ'}}</h2>
												<p>{{$value->product_name}}</p>
												<form action="{{url('/save-cart')}}" method="POST">
													{{ csrf_field() }}
												<span>
												
													<input name="qty" type="hidden" value="1" />
												<input name="product_hidden" type="hidden"  value="{{$value->product_id}}"  />
													<button type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm vào giỏ hàng
													</button>
												</span>
												</form>
											</div>
											
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="sunglass" >
									
								@foreach($l_product as $key=>$value)	
								@if ($value->category_id =="13")
								
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="{{url('/chi-tiet/'.$value->product_id)}}"><img src="{{url('public/upload/'.$value->product_image)}}" alt="" /></a>
												<h2>{{$value->product_price}}</h2>
												<p>{{$value->product_name}}</p>
												<form action="{{url('/save-cart')}}" method="POST">
													{{ csrf_field() }}
												<span>
												
													<input name="qty" type="number" value="1" />
												<input name="product_hidden" type="hidden"  value="{{$value->product_id}}"  />
													<button type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm vào giỏ hàng
													</button>
												</span>
												</form>
											</div>
											
										</div>
									</div>
								</div>
								@endif
								@endforeach
								
								
							</div>
							
							
						</div>
					</div><!--/category-tab-->
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Tác phẩm đáng chú ý</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{url('/chi-tiet/'.'7')}}"><img src="{{('public/Front-End/images/home/Sach2jpg.jpg')}}" alt="" /></a>
													<h2>169.000đ</h2>
													<p>Người trong muôn nghề</p>
													<form action="{{url('/save-cart')}}" method="POST">
														{{ csrf_field() }}
													<span>
													
														<input name="qty" type="hidden" value="1" />
													<input name="product_hidden" type="hidden"  value="7"  />
														<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm vào giỏ hàng
														</button>
													</span>
													</form>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{url('/chi-tiet/'.'11')}}"><img src="{{('public/Front-End/images/home/tieuthuyet.jpg')}}"  alt="" /></a>
													<h2>120.000đ</h2>
													<p>Quân vương</p>
													<form action="{{url('/save-cart')}}" method="POST">
														{{ csrf_field() }}
													<span>
													
														<input name="qty" type="hidden" value="1" />
													<input name="product_hidden" type="hidden"  value="11"  />
														<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm vào giỏ hàng
														</button>
													</span>
													</form>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{url('/chi-tiet/'.'3')}}"><img src="{{('public/Front-End/images/home/Ruoitrau.jpg')}}"  alt="" /></a>
													<h2>96.000đ</h2>
													<p>Ruồi Trâu</p>
													<form action="{{url('/save-cart')}}" method="POST">
														{{ csrf_field() }}
													<span>
													
														<input name="qty" type="hidden" value="1" />
													<input name="product_hidden" type="hidden"  value="3"  />
														<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm vào giỏ hàng
														</button>
													</span>
													</form>
												</div>
												
											</div>
										</div>
                                    </div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{url('/chi-tiet/'.'4')}}"><img src="{{('public/Front-End/images/home/chipheo.jpg')}}" alt="" /></a>
													<h2>72.000đ</h2>
													<p>Chí phèo</p>
													<form action="{{url('/save-cart')}}" method="POST">
														{{ csrf_field() }}
													<span>
													
														<input name="qty" type="number" value="1" />
													<input name="product_hidden" type="hidden"  value="4"  />
														<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm vào giỏ hàng
														</button>
													</span>
													</form>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{url('/chi-tiet/'.'6')}}"><img src="{{('public/Front-End/images/home/khonkho.jpg')}}" alt="" /></a>
													<h2>120.000đ</h2>
													<p>Những người khốn khổ</p>
													<form action="{{url('/save-cart')}}" method="POST">
														{{ csrf_field() }}
													<span>
													
														<input name="qty" type="hidden" value="1" />
													<input name="product_hidden" type="hidden"  value="6"  />
														<button type="submit" class="btn btn-fefault cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm vào giỏ hàng
														</button>
													</span>
													</form>
												</div>
												
											</div>
										</div>
									</div>
								
                                    
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection