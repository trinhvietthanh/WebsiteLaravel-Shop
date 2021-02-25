@extends('admin_layout')
@section('admin_content')
<h1>Chào mừng {{ Auth::user()->name }} đến với trang quản trị</h1> 
@endsection
