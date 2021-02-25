@extends('admin_layout')
@section('admin_content')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa sản phẩm
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="alert alert-warning">'.$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                        <div class="panel-body">
                            <div class="position-center row col-lg-12">
                                <form role="form" action="{{url('/update-product/'. $product->id)}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                <div class="form-group col-lg-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required autocomplete="name" autofocus onkeyup="ChangeToSlug();" id="name" placeholder="Điền tên sản phẩm">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{$product->slug}}" placeholder="slug" readonly>
                                </div>
                                <label class="col-lg-12" >Hình ảnh sản phẩm</label>
                                <div class="form-group">

                                    <div class="col-lg-4">
                                        @if ($product->photo != '')
                                            <p><img id="output" style="max-width: 100%" src="{{url('public/upload/'. $product->photo)}}"></p>
                                            <input type="file" name="photo1" accept="image/*" id="file" onchange="loadFile(event)" style="display: none;">
                                            <p><label for="file" style="cursor: pointer;">Thay ảnh ảnh sản phẩm</label></p>
                                        @else
                                            <p><img id="output" style="max-width: 100%"></p>
                                            <input type="file" name="photo1" accept="image/*" id="file" onchange="loadFile(event)" style="display: none;">
                                            <p><label for="file" style="cursor: pointer;">Đặt ảnh cho sản phẩm</label></p>
                                        @endif


                                    </div>
                                    <div class="col-lg-4">
                                         <p><img id="output1" style="max-width: 100%"></p>
                                        <input type="file" class="form-control" name="photo2" accept="image/*" id="file1" onchange="loadFile1(event)">
                                    </div>
                                    <div class="col-lg-4">
                                         <p><img id="output2" style="max-width: 100%"></p>
                                        <input type="file" class="form-control" name="photo3" accept="image/*" id="file2" onchange="loadFile2(event)">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-lg-4">
                                        <label>Giá sản phẩm</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" placeholder="Giá sản phẩm">
                                        @error('price')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Giảm giá</label>
                                        <input type="number" class="form-control @error('discount') is-invalid @enderror" value="{{ $product->discount }}" required autocomplete="discount" name="discount">
                                        @error('discount')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Tồn kho</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" value="{{$product->detailProduct->stock}}" value="{{ old('stock') }}" required name="stock">
                                        @error('stock')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea rows="8" class="form-control" name="desc" placeholder="Mô tả sản phẩm">{!! $product->description !!}</textarea>
                                    @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Nội dung sản phẩm</label>
                                    <textarea rows="8" class="form-control" name="content" placeholder="Nội dung sản phẩm">
                                        {!! $product->detailProduct->content !!}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <br>
                                    <label for="">Danh mục chính</label>
                                    <select name="category" id="category" class="form-control  input-sm m-bot15" required="Yêu cầu chọn danh mục chính">
                                        @foreach($product->categories as $value)
                                            @if($value->category_parent == 0)
                                                <option value="{{$value->id}}">{{$value->name}}</option>>
                                            @endif
                                        @endforeach

                                        @foreach($category as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <fieldset>

                                        <p id= "categorySon"></p>
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label for="">Tác giả</label>
                                    <select name="author" id="" class="form-control  input-sm m-bot15" required="Yêu cầu chọn tác giả">
                                        <option value="">-- Tác giả --</option>>
                                        @foreach($author as $key => $auth)
                                            <option value="{{$auth->id}}">{{$auth->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nhà xuất bản</label>
                                    <select name="publisher" id="" class="form-control  input-sm m-bot15" required="Yêu cầu chọn tác giả">
                                        <option value="{{$product->publisher->id}}">{{$product->publisher->name}}</option>>
                                        @foreach($publishers as $key => $publisher)
                                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa</label>
                                    <input type="text" name="keywords" value="{{$product->detailProduct->keywords}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="status">Hiển thị</input>
                                </div>
                                <input type="submit" class="btn btn-info" value="Cập nhật sản phẩm">
                            </div>

                            </form>
                            </div>

                        </div>
                    </section>

            </div>
<script>
     var loadFile = function(event){
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
    var loadFile1 = function(event){
        var image = document.getElementById('output1');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
    var loadFile2 = function(event){
        var image = document.getElementById('output2');
        image.src = URL.createObjectURL(event.target.files[0]);
    }


</script>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#category").change(function(){
            var id = $(this).val();
            $.get("/get/categories/"+ id, function(data){
                $("#categorySon").html(data);
            })
        });
    });
</script>
@endsection
