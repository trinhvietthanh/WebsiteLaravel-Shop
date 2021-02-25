<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Backend\Category;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view,category')->only('show');
    }

    public function add_category_product(){
        $parent = Category::where("category_parent", 0)->get();
        return view('admin.add_category_product', compact("parent"));
    }
    public function all_category_product(){
        $all_category_product = Category::paginate(8);
    	$manager_category_product  = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product);

    }
    public function save_category_product(){
        request()->validate([
            'name'=>['required', 'min:3', 'max:255'],
            'slug'=> 'required',
            'parent'=>'required'
        ]);
        $category = new Category;
        $category->name = \request("name");
        $category->slug = \request("slug");
        $category->desc = \request("desc");
        $category->category_parent = \request("parent");
        $category->save();
        Session::put('message','Thêm danh mục '. $category->name .' thành công');
        return Redirect::to('all-category');
    }
    public function edit_category_product($id){
        $edit_value= Category::find($id);
        $category = Category::where("category_parent", 0)->get();
    	return view('admin.edit_category_product', \compact("edit_value", "category"));
    }
    public function update_category_product($id){
        request()->validate([
            'name'=>['required', 'min:3', 'max:255'],
            'slug'=> 'required',
            'parent'=>'required'
        ]);
        $category = Category::find($id);
        $category->name = \request("name");
        $category->slug = \request("slug");
        $category->desc = \request("desc");
        $category->category_parent = \request("parent");
        $category->save();
        Session::put('message','Cập nhật danh mục '. $category->name .' thành công');
        return Redirect::to('all-category');
    }
    public function delete_category_product($id){
        Category::destroy($id);
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }

}
