@extends('admin_layout')

@section('title')
<title>Thêm nhà xuất bản</title>
@endsection

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm nhà xuất bản
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
                    <form action="{{url('/save-publisher')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên nhà xuất bản</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Điền tên nhà xuất bản">
                            @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" value="{{ old('address') }}" required="" name="address">
                        </div>
                        <div class="form-group">
                            <label>SĐT</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('phone_number') }}" autocomplete="name" required name="phone_number">
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
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            DỮ LIỆU VỀ NXB
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên NXB</th>
              <th>Địa chỉ</th>
              <th>SĐT</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $message =Session::get('message');
            if($message){
              echo '<span class="alert alert-success">'.$message.'</span>';
              Session::put('message',null);
            }
          ?>
            @foreach($publishers as $key => $publisher)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$publisher->name}}</td>
            <td>{{$publisher->address}}</td>
            <td>{{$publisher->phone_number}}</td>
              <td>
                <a href="{{URL::to('/edit-publisher/'.$publisher->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc chắn NBX này không?')" href="{{URL::to('/delete-publisher/'.$publisher->id)}}" class="active styling edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">
            {{ $publishers->links() }}
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
