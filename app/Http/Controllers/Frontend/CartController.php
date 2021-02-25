<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Author;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function __construct()
    {
        $category = Category::where('category_parent', 0)->limit(4)->get();
        $categorySon = Category::where('category_parent', '<>',0)->limit(4)->get();
        view()->share([
            'category' => $category,
            'categorySon' => $categorySon
        ]);

    }
    public function save_cart(request $request){
        
        $productId = $request->product_hidden;
    	$quantity = $request->qty;
    	$product_info = Product::FindOrFail($productId);

        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->name;
        $data['price'] = ($product_info->price * (100 - $product_info->discount)/100);
        $data['weight'] = $product_info->price;
        $data['options']['image'] = $product_info->photo;
        Cart::add($data);
    
        return Redirect::to('/gio-hang');

    }
    public function show(){
        $author = Author::all();
        return view('pages.show_cart', compact('author'));
    }
    public function delete_cart($rowID){
        Cart::update($rowID,0);
        return redirect('/gio-hang');
    }
    public function update_cart(request $request){
        $rowID= $request->rowId_cart;
        $qty= $request->cart_quantity;
        Cart::update($rowID,$qty);
        return redirect('/gio-hang');
    }
}
