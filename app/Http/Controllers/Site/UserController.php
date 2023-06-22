<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\FavoriteProduct;
use App\Models\Order;
use App\Models\Product;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait,UploadFiles;

    public function profile(){
        $orders = Order::where('user_id',loggedUser('id'))->latest()->get();
        return view('Site/User/profile',compact('orders'));
    }


    // cart handle
    public function addToCart(request $request){
        $data = $request->validate([
            'product_id'   =>'required|exists:products,id',
        ]);

        // check if exists in the cart
        $check = Cart::where([['product_id',$data['product_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            return response()->json([
                'status' => 202,
                'message' => "المنتج موجود بالفعل في السلة",
            ]);
        }

        // add to cart
        $data['user_id'] = loggedUser('id');

        // get the price
        $product = Product::find($data['product_id']);
        if($product->price_after != 0)
            $data['price'] = $product->price_after;
        else
            $data['price'] = $product->price_before;

        Cart::create($data);
        $count = Cart::where('user_id', $data['user_id'])->count();
        return response()->json([
            'status' => 200,
            'message' => "تم اضافة المنتج للسلة",
            'count'   => $count
        ]);
    }


    public function getMyCart(){
        $cart_elements = Cart::where('user_id', loggedUser('id'))
            ->with('product')->latest()->take('5')->get();
        if($cart_elements->count() == 0)
            return view('Site/User/Empty-Cart');
        else
            return view('Site/User/Cart',compact('cart_elements'));
    }

    public function deleteFromMyCart(request $request){
        $data = $request->validate([
            'cart_id'   =>'required|exists:carts,id',
        ]);
        // check if exists in the cart
        $check = Cart::where([['id',$data['cart_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            // remove from cart
            $data['user_id'] = loggedUser('id');
            $check->delete();
            $count = Cart::where('user_id', $data['user_id'])->count();
            return response()->json([
                'status' => 200,
                'message' => "تم حذف المنتج من السلة",
                'count'   => $count
            ]);
        }
    }
    ///////////////

    // wishlist handle
    public function addToWishlist(request $request){
            $data = $request->validate([
            'product_id'   =>'required|exists:products,id',
        ]);



        // check if exists in the wishlist
        $check = FavoriteProduct::where([['product_id',$data['product_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            $check->delete();
            $count = FavoriteProduct::where('user_id',loggedUser('id'))->count();
            return response()->json([
                'status' => 200,
                'message' => "تم ازالة المنتج من المفضلة",
                'count'   => $count
            ]);
        }
        else{
            // add to cart
            $data['user_id'] = loggedUser('id');
            FavoriteProduct::create($data);
            $new_count = FavoriteProduct::where('user_id',loggedUser('id'))->count();
            return response()->json([
                'status' => 200,
                'message' => "تم اضافة المنتج الي المفضلة",
                'count'   => $new_count
            ]);
        }
    }

    public function wishlistPage(){
        $userFavProducts = FavoriteProduct::where('user_id',loggedUser('id'))
            ->with(['product'=> function ($query) {
        $query->select('id', 'title','image','price_before','price_after');
    }])->select('id','product_id')->get();
        return view('Site/User/wishlist',compact('userFavProducts'));
    }

    public function removeFavourite(request $request){
        $data = $request->validate([
            'favourite_id'   =>'required|exists:favorite_products,id',
        ]);
        // check if exists in the wishlist
        $check = FavoriteProduct::where([['id',$data['favourite_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            $check->delete();
            $count = FavoriteProduct::where('user_id',loggedUser('id'))->count();
            return response()->json([
                'status' => 200,
                'message' => "تم ازالة المنتج من المفضلة",
                'count'   => $count,
            ]);
        }
    }
    /////////////////////


}
