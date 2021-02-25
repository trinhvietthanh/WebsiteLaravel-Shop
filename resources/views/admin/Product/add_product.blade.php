@extends('admin_layout')
@section('admin_content')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form name="form" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                <div class="form-group col-lg-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus onkeyup="ChangeToSlug();" id="name" placeholder="Điền tên sản phẩm">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" readonly>
                                </div>
                                <label class="col-lg-12" >Hình ảnh sản phẩm</label>
                                <div class="form-group">

                                    <div class="col-lg-4">
                                        <p><img id="output" style="max-width: 100%"></p>
                                        <input type="file" class="form-control " name="photo1" accept="image/*" id="file" onchange="loadFile(event)">

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
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" placeholder="Giá sản phẩm">
                                        @error('price')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Giảm giá</label>
                                        <input type="number" class="form-control text-danger" name="discount">
                                        @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Tồn kho</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('name') }}" required name="stock">
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea rows="8" class="form-control" name="desc" placeholder="Mô tả sản phẩm"></textarea>
                                    @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Nội dung sản phẩm</label>
                                    <textarea rows="8" class="form-control" name="content" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <br>
                                    <label for="">Danh mục chính</label>
                                    <select name="category" id="category" class="form-control  input-sm m-bot15" required="Yêu cầu chọn danh mục chính">
                                        <option value="">-- Danh mục --</option>>
                                        @foreach($category as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group content">
                                    <fieldset>


                                        <div id= "categorySon"></div>
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
                                        <option value="">-- Nhà xuất bản --</option>>
                                        @foreach($publishers as $key => $publisher)
                                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa</label>
                                    <input type="text" name="keywords" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="status">Hiển thị</input>
                                </div>
                                <input type="submit" class="btn btn-info" value="Thêm sản phẩm">
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

{{-- @section('script')
<script>
    $(document).ready(function(){
        $("#category").change(function(){
            var id = $(this).val();
            $.get("/get/categories/"+ id, function(data){
                $("#categorySon").html(data);
            })
        });
    });
    $(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name'              : $('input[name=name]').val(),
            'slug'             : $('input[name=slug]').val(),
            'stock'    : $('input[name=stock]').val(),
            'categories' : $('input[name=categories]').val(),
        };
        alert(formData.categories);
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'process.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
</script>

@endsection --}}
