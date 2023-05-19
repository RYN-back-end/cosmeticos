<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use ResponseTrait;
    public function index(){
        $sliders         = Slider::latest()->limit(10)->get();
        $products        =  Product::with('images')->limit(4)->get();
        $latestProducts  =  Product::latest()->limit(6)->get();
        $highestProducts =  Product::orderBy('stars','DESC')->limit(6)->get();
        $reviews         = DB::table('reviews')->inRandomOrder()->limit(5)->get();
        return view('Site.index',compact('sliders','products','reviews','latestProducts','highestProducts'));
    }

    public function productPage(){
        $products = Product::latest()->paginate(9);
        return view('Site.products',compact('products'));
    }


    public function productDetails($title){
        $product =  Product::with(['images','reviews' => function ($query) {
            $query->latest();
        }])->where('title',$title)->firstOrFail();
        $latestProducts = DB::table('products')->inRandomOrder()->limit(6)->get();;
        return view('Site.product-details',compact('product','latestProducts'));
    }

    public function contactUs(){
        $latestProducts = DB::table('products')->inRandomOrder()->limit(3)->get();;
        return view('Site.contact',compact('latestProducts'));
    }

    public function postContactUs(ContactUsRequest $request){
        $validatedData = $request->validated();
        ContactUs::create($validatedData);
        return $this->addResponse();
    }

    public function postSubscribe(request $request){
        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required' => "يرجي كتابة بريدك الالكتروني للاشتراك"
        ]);
        $data = $request->only('email');
        $check = ContactUs::where('email',$data)->first();
        if($check){
            return response()->json([
                'status'  => 405,
            ]);
        }
        ContactUs::create($data);
        return $this->addResponse();
    }

    public function blogs(){
        $blogs = Blog::latest()->paginate(6);
        $latestProducts = DB::table('products')->inRandomOrder()->limit(3)->get();;
        return view('Site/Blog/index',compact('blogs','latestProducts'));
    }

    public function blogDetails($id){
        $blog = Blog::findOrFail($id);
        $blog['publish_date'] = Carbon::parse($blog->created_at)->format('M j, Y');
        $latestProducts = DB::table('products')->inRandomOrder()->limit(3)->get();;
        $latestBlogs = DB::table('blogs')->where('id','!=',$id)->latest()->limit(3)->get();
        $suggestedBlogs = DB::table('blogs')->where('id','!=',$id)->inRandomOrder()->limit(6)->get();;
        return view('Site/Blog/blog-details',compact('blog','latestBlogs','latestProducts','suggestedBlogs'));
    }

    public function about(){
        return view('Site/about');
    }
}
