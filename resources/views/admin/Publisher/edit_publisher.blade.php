@extends('admin_layout')

@section('title')
<title>Nhà xuất bản</title>
@endsection

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thay đổi thông tin nhà xuất bản
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
                    <form action="{{url('/update-publisher/'. $publisher->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên nhà xuất bản</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $publisher->name }}" required autocomplete="name" autofocus placeholder="Điền tên nhà xuất bản">
                            @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" value="{{$publisher->address}}" name="address" required>
                        </div>
                        <div class="form-group">
                            <label>SĐT</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="name" name="phone_number" value="{{$publisher->phone_number}}" required="">
                            @error('phone_number')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <input type="submit" value="Thêm NXB">
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
