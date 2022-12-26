<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(Product $product){
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id', $user_id)->first()->id;
        $user_cart_detail = $product->cartDetail()->where('cart_id', $cart_id)->first();

        return view("pages.product", [
            "product" => $product,
            "user_cart_detail" => $user_cart_detail
        ]);
    }
}
