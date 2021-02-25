@extends('admin_layout')

@section('title')
<title>Thêm tác giả</title>
@endsection

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm tác giả
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
                    <form action="{{url('/save-author-product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên tác giả</label>
                            <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="name" name="name" placeholder="Điền tên tác giả">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" readonly>
                        </div>
                        <div class="form-group">
                                        <p><img id="output" style="max-width: 100%"></p>
                                        <input type="file" class="form-control " name="image" accept="image/*" id="file" onchange="loadFile(event)">

                                    </div>

                        <input type="submit" value="Thêm tác giả">
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
