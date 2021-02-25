@extends('admin_layout')
@section('admin_content')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sử tác giả
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{url('/update-author-product/'. $author->id)}}" method="post">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                    <label>Tên tác giả</label>
                                    <input type="text" class="form-control" value="{{$author->name}}" name="name" id="name" onkeyup="ChangeToSlug();" placeholder="Điền tên tác giả">
                                </div>
                                <div class="form-group">
                                    <label>Các tác phẩm</label>
                                    <input type="text" class="form-control" value="{{$author->slug}}" name="slug" id="slug">
                                </div>
                            <div class="content featured-image">
                            @if ($author->image != '')
                            <p><img id="output" style="max-width: 100%" src="{{url('public/uploads/'. $article->image)}}"></p>
                            <input type="file" name="image" accept="image/*" id="file" onchange="loadFile(event)" style="display: none;">
                            <p><label for="file" style="cursor: pointer;">Thay ảnh đại diện</label></p>
                        @else
                            <p><img id="output" style="max-width: 100%"></p>
                            <input type="file" name="image" accept="image/*" id="file" onchange="loadFile(event)" style="display: none;">
                            <p><label for="file" style="cursor: pointer;">Đặt đại diện</label></p>
                        @endif

                        </div>
                                <button type="submit" name="add_author_product" class="btn btn-info">Cập nhật tác giả</button>
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
</script>
@endsection
