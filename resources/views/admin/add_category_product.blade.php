@extends('admin_layout')

@section('title')
    <title>Thêm danh mục</title>
@endsection

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="alert alert-warning">'.$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{url('/save-category-product')}}" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug();" placeholder="Điền tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Chuyên mục bao hàm</label>
                                    <select name="parent" class="form-control">
                                        <option value="0">None</option>
                                        @foreach ($parent as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    <p>Chuyên mục lớn chứa các chuyên mục con</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Mô tả danh mục</label>
                                    <textarea rows="8" class="form-control" name="desc" placeholder="Mô tả danh mục"></textarea>
                                </div>

                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
