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
        $cart_id = Cart::current()->first()->id;

        return view("pages.product", [
            "product" => $product,
        ]);
    }
}
