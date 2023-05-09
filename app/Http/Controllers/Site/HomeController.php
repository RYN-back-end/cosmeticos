<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products =  Product::with('images')->get();
        return view('Site.index',compact('products'));
    }


    public function productDetails($title){
        $product =  Product::with('images')->where('title',$title)->firstOrFail();
        return view('Site.product-details',compact('product'));
    }
}
