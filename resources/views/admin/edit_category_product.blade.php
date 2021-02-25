@extends('admin_layout')

@section('title')
    <title>Chỉnh sửa danh mục</title>
@endsection

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa danh mục
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
                                <form role="form" action="{{url('/update-category-product/'. $edit_value->id)}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên danh mục</label>
                                            <input type="text" class="form-control" id="name" onkeyup="ChangeToSlug();" name="name"
                                            value="{{$edit_value->name}}" placeholder="Điền tên danh mục">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{$edit_value->slug}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Chuyên mục bao hàm</label>
                                            <select name="parent" class="form-control" >
                                                @if($edit_value->category_parent == 0)
                                                    <option value="0">None</option>
                                                @else
                                                @foreach($category as $parentCate)
                                                    @if($parentCate->id == $edit_value->category_parent)
                                                        <option value="{{$parentCate->id}}">{{$parentCate->name}}</option>
                                                    @endif
                                                @endforeach
                                                @endif
                                                @foreach ($category as $data)

                                                @if ($data->id != $edit_value->category_parent)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <p>Chuyên mục lớn chứa các chuyên mục con</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                                            <textarea rows="8" class="form-control" id="exampleInputPassword1"
                                            name="desc" placeholder="Mô tả danh mục">{!! $edit_value->desc !!}</textarea>
                                        </div>

                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                        </div>
                    </section>

            </div>
@endsection
