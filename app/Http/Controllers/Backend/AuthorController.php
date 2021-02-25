<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Author;
use App\User;
use App\Permission;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();
class AuthorController extends Controller
{
        public function add_author_product(){

            return view('admin.add_author');
        }
        public function all_author_product(){
            $all_author = Author::paginate(10);

            return view('admin.all_author', compact("all_author"));

        }
        public function save_author_product(){

            request()->validate([
                'name'=>'required|unique:author|min:3|max:255',
                'slug'=> 'required',
            ]);
            $author = new Author;
            $author->name = \request("name");
            $author->slug = \request("slug");
            $author->save();
            Session::put('message','Thêm danh tác giả thành công');
            return Redirect::to('all-author');
        }


        public function edit_author_product($id){
            $author=Author::find($id);
            return view('admin.edit_author', compact("author"));
        }
        public function update_author_product($id){

            request()->validate([
                'name'=>'required|unique:author|min:3|max:255',
                'slug'=> 'required',
            ]);
            $author = Author::find(request("id"));
            $author->name = \request("name");
            $author->slug = \request("slug");
            $author->update();
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-author');
        }
        public function delete_author_product($id){
            Author::destroy($id);
            Session::put('message','Xóa sản phẩm thành công');
            return Redirect::to('all-author');
        }
        //end admin page
}

