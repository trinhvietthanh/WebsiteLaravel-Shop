<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Backend\Author;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\DetailProduct;
use App\Models\Backend\Publisher;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
session_start();
class ProductController extends Controller
{
    public function add_product(){
        $category = Category::where('category_parent', 0)->get();
        $author = Author::all();
        $publishers = Publisher::all();
    	return view('admin.product.add_product', compact("category", "author", "publishers"));

    }
    public function all_product(){
    	$product  = Product::paginate(10);
    	return view('admin.product.all_product', compact("product"));
    }
    public function save_product(Request $request){
        request()->validate([
            'name'=>['required', 'min:3', 'max:255'],
            'slug'=> 'required',
            'price'=>'required',
            'stock'=>['required', 'int'],
            'discount'=>['required', 'int', 'max:100']
        ]);
        dd(request('categories'));
    	$product = new Product;
    	$product->name = \request("name");
    	$product->slug = \request("slug");
    	$product->description = \request("desc");
        $product->price = \request("price");
        $product->discount = \request("discount");
        $product->author_id = request("author");
        $product->publisher_id = request("publisher");
        $product->status = request("status") == "on" ? true : false;
        $detail_product = new DetailProduct;
        $detail_product->stock = \request("stock");
        $detail_product->keywords = request("keywords");
        $detail_product->content = \request("content");

        $detail_product->photo_2 = "";
        $detail_product->photo_3 = "";
        $get_image = request('photo1');

        if($get_image){
            // $get_name_image = $get_image->getClientOriginalName();
            // $name_image = current(explode('.',$get_name_image));
            // $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // $get_image->move('public/upload',$new_image);
            $product->photo = Storage::putFile('photo1', $request->file('photo1'));;
            $product->save();
            $detail_product->save();
            $product->categories()->attach(request('category'));
            $product->categories()->attach(request('category_id'));
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $product->save();
        $detail_product->save();
        $product->categories()->attach(request('category'));
        $product->categories()->attach(request('category_id'));

    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function inactive_product($id){
        $product  = Product::FindOrFail($id);
        $product->status = !$product->status;
        $product->update();
        Session::put('message','Ẩn'. $product->name .'thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($id){
        $category = Category::where('category_parent', 0)->get();
        $author = Author::all();
        $publishers = Publisher::all();
        $product = Product::FindOrFail($id);
        $category_son = Category::where('category_parent', '<>', 0)->get();
        return view('admin.Product.edit_product', compact('product', 'category_son', 'category', 'author', 'publishers'));
    }
    public function update_product(Request $request,$id ){

        request()->validate([
            'name'=>['required', 'min:3', 'max:255'],
            'slug'=> 'required',
            'price'=>'required',
            'stock'=>['required', 'int'],
            'discount'=>['required', 'int', 'max:100']
        ]);
        $product = Product::FindOrFail($id);
        $product->name = \request("name");
        $product->slug = \request("slug");
        $product->description = \request("desc");
        $product->price = \request("price");
        $product->discount = \request("discount");
        $product->author_id = request("author");
        $product->publisher_id = request("publisher");
        $product->status = request("status") == "on" ? true : false;
        $detail_product = DetailProduct::FindOrFail($id);
        $detail_product->stock = \request("stock");
        $detail_product->keywords = request("keywords");
        $detail_product->content = \request("content");

        $detail_product->photo_2 = "";
        $detail_product->photo_3 = "";
        $get_image = request('photo1');

        if($get_image){
            // $get_name_image = $get_image->getClientOriginalName();
            // $name_image = current(explode('.',$get_name_image));
            // $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // $get_image->move('public/upload',$new_image);
            $product->photo = Storage::putFile('photo1', $request->file('photo1'));;
            $product->update();
            $detail_product->update();
            $product->categories()->sync(request('category'));
            $product->categories()->sync(request('category_id'));
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-product');
        }
        $product->update();
        $detail_product->update();
        $product->categories()->sync(request('category'));
        $product->categories()->sync(request('category_id'));

        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($id ){
        Product::destroy($id);
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
     public function ajaxProduct($id){
        $category = Category::where('category_parent', $id)->get();
        echo  "<legend>Danh mục</legend>";
        foreach($category as $data){
            echo "<input type='checkbox' name='categories[]' value='".$data->id."'>". $data->name. " <br/>";
        }
    }

    //end admin page
}
