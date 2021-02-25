<?php

namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Publisher;
session_start();

class PublisherController extends Controller
{
    public function index(){
        $publishers = Publisher::paginate(6);
        return view('admin.Publisher.publisher', compact('publishers'));
    }
    public function create(Request $request)
    {
        request()->validate([
            'name'=>['required', 'min:3', 'unique:publishers', 'max:255'],
            'address'=> 'required',
            'phone_number'=>['required', 'min:8', 'max:10']
        ]);
        Session::put('message','Thêm NXB '. $request->name .' thành công');
        $publisher = Publisher::create($request->all());

        return redirect('admin/publisher');
    }
     public function edit($id){
        $publisher= Publisher::find($id);
        return view('admin.Publisher.edit_publisher', \compact("publisher"));
    }
    public function update($id){
        request()->validate([
            'name'=>['required', 'min:3', 'max:255'],
            'address'=> 'required',
            'phone_number'=>['required', 'min:8', 'max:10']
        ]);
        $publisher = Publisher::find($id);
        $publisher->name = \request("name");
        $publisher->address = \request("address");
        $publisher->phone_number = \request("phone_number");
        $publisher->save();
        Session::put('message','Cập nhật NXB '. $publisher->name .' thành công');
        return redirect('admin/publisher');
    }
    public function delete($id){
        Publisher::destroy($id);
        Session::put('message','Xóa NXB thành công');
        return redirect('admin/publisher');
    }
}
