<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $products       =  Product::with('images')->limit(4)->get();
        $latestProducts =  Product::latest()->limit(6)->get();
        $reviews        = DB::table('reviews')->inRandomOrder()->limit(5)->get();
        return view('Site.index',compact('products','reviews','latestProducts'));
    }


    public function productDetails($title){
        $product =  Product::with('images')->where('title',$title)->firstOrFail();
        return view('Site.product-details',compact('product'));
    }
}
