<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Author;
use App\Models\Backend\Product;
use App\Models\Bill;
use App\Models\BillDetail;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();
class CheckoutController extends Controller
{
    public function __construct()
    {
        $category = Category::where('category_parent', 0)->limit(4)->get();
        $categorySon = Category::where('category_parent', '<>',0)->limit(4)->get();
        $author = Author::all();
        view()->share([
            'author' => $author,
            'category' => $category,
            'categorySon' => $categorySon
        ]);

    }
    public function login_checkout(){
        if(Auth::user()->name != NULL){
            return view('pages.login_checkout');
        }else return \redirect('/');

    }
    public function checkout(){
       
        return view('pages.check_out');

    }
    public function save_checkout()
    {
        
        $bill = new Bill;
        $content = Cart::content();
        $bill->user_id=Auth::id();
        $bill->method = \request('method');
        $bill->don_gia = Cart::total();
        $detail_bill = new BillDetail;
        $detail_bill->user_id = Auth::id();
        $detail_bill->name = request('name');
        $detail_bill->address = request('address');
        $detail_bill->phone = request('phone');
        $detail_bill->note = \request('note');
        
        $bill->save();
        $detail_bill->save();
        foreach($content as $value){
            $bill->products()->attach($value->id, ['qty' => $value->qty]);   
        }
        Cart::destroy();
        return \redirect('/order/history');
        
    }
    public function order_history(){
        $bills = Bill::where('user_id',  Auth::id())->get();
        return view('pages.order_history', compact('bills'));
    }
}
