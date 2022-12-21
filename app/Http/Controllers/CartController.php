<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*
        Display Cart Items
    */
    public function index(){
        $cartItems = CartDetail::where("cart_id", Cart::where("user_id", Auth::user()->id)->first()->id)->with("product")->get();

        $totalQuantity = 0;
        foreach($cartItems as $item){
            echo $item;
            // $totalQuantity += $item->quantity;
        }

        return view("pages.cart", [
            "price" => 0,
            "quantity" => $totalQuantity,
            "cartItems" => $cartItems,
        ]);
    }


    /*
        Add new Item to Cart
    */
    public function add(Request $request){
        $newCartItem = CartDetail::create([
            "cart_id" => Cart::where("user_id", Auth::user()->id)->first()->id,
            "product_id" => $request->addedProduct,
            "quantity" => $request->quantity,
        ]);

        return redirect()->back()->with("add-success", "Product successfully added to cart!");
    }


    /*
        Display edit cart page
    */
    public function edit(Product $product){
        return view("pages.product", [
            "product" => $product,
        ]);
    }


    /*
        Update cart item quantity
    */
    public function update(Product $product, Request $request){
        CartDetail::where("id", $product->id)->update(["quantity" => $request->quantity]);
    }
}
