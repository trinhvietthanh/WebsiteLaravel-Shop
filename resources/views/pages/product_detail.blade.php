@extends('layout')
@section('content')

    

    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
            <img src="{{url('storage/app/'.$selectPro->photo)}}" alt="" />
                
            </div>
            

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                
                <h2>{{$selectPro->name}}</h2>
                <br/>
            <p>Web ID: {{$selectPro->id}}</p>
               
            <form action="{{url('/save-cart')}}" method="POST">
                    {{ csrf_field() }}
                <span>
                  
                        
                        <span>{{number_format($selectPro->price * (100 - $selectPro->discount)/100).'đ'}}</span>
                        
                        <p style="text-decoration: line-through;">{{number_format($selectPro->price).'đ'}}</p>
                        @if($selectPro->detailProduct->stock > 0)
                <div>   
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1" max="{{$selectPro->detailProduct->stock}}" value="1" />
                    <input name="product_hidden" type="hidden"  value="{{$selectPro->id}}"  />
                </div>
                
                    @endif
                </span>
            </form>
                <p><b>Trạng thái:</b>@if($selectPro->detailProduct->stock > 0) Còn hàng @else Hết hàng @endif</p>
                <p><b>Thể loại:</b> {{$selectPro->category}}</p>
                <p><b>Tác giả:</b> {{$selectPro->author->name}}</p>
                <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm vào giỏ hàng
                </button>
            </div><!--/product-information-->
        </div>
    
   <!--/product-details-->
   <div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Nội dung</a></li>
           
            <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details" >
           
            <p>{!!$selectPro->detailProduct->content!!}</p>
        </div>
        
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
            <p>{!!$selectPro->description!!}</p>
        </div>
        
    </div>
</div><!--/category-tab-->
                   
                   
@endsection