<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Author;
use Cart;

class HomeController extends Controller
{
    public function __construct()
    {
        $category = Category::where('category_parent', 0)->limit(4)->get();
        view()->share([
            'category' => $category,
        ]);

    }
    public function index()
    {
        $product = Product::latest()->get();
        $author = Author::all();
        $categorySon = Category::where('category_parent', '<>', 0)->get();
        $listCategory = Category::where('category_parent', 0)->limit(10)->get();
        return view('pages.home', compact('product' ,'author', 'listCategory', 'categorySon'));
    }
    public function category(Category $selectCate)
    {
        
        $author = Author::all();
        
        $categorySon = Category::where('category_parent', $selectCate->id)->limit(10);
        return view('pages.category', compact('author', 'categorySon', 'selectCate'));
    }
    public function detail_product(Product $selectPro)
    {
    
        $author = Author::all();
        $categorySon = Category::where('category_parent', 0)->limit(10);
        return view('pages.product_detail', compact( 'author', 'categorySon', 'selectPro'));
    }
}
