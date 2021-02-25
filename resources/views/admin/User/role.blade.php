@extends('admin_layout')

@section('title')
    <title>Phân quyền cho người dùng</title>
@endsection

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Phân quyền
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
                                <form role="form" action="{{url('/update-role')}}" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Tên tên người dùng</label>
                                    <select name="user" id="" class="form-control  input-sm m-bot15" required="Yêu cầu chọn tác giả">
                                        <option value="">-- Tên người dùng --</option>>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Chức năng</label>
                                    <select name="role" id="" class="form-control  input-sm m-bot15" required="Yêu cầu chọn tác giả">
                                      <option value="">-- Tên chức năng --</option>>
                                      @foreach($roles as $role)
                                          <option value="{{$role->id}}">{{$role->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                               

                                <input type="submit"  class="btn btn-info" value="Cập nhật chức năng">
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
