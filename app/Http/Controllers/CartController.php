<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cartItems = CartDetail::where("cart_id", Cart::where("user_id", Auth::user()->id)->first()->id)->get();

        $totalQuantity = 0;
        foreach($cartItems as $item){
            $totalQuantity += $item->quantity;
        }

        return view("pages.cart", [
            "price" => 0,
            "quantity" => $totalQuantity,
            // "cartItems" => $cartItems,
        ]);
    }
}
