<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display Cart Items
    public function index(){
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id', $user_id)->first()->id;
        $user_cart = Cart::find($cart_id);
        $cart_details = $user_cart->cartDetails();
        $total_quantity = $cart_details->sum('quantity');
        $total_price = $user_cart->products()->sum('price');
        return view("pages.cart", [
            "total_quantity" => $total_quantity,
            "total_price" => $total_price,
            "cart_details" => $cart_details->get(),
        ]);
    }
    // Add new Item to Cart
    public function add(Request $request){
        $validated = $request->validate([
            "product_id" => 'required',
            "quantity" => 'required|numeric|gt:0',
        ]);
        CartDetail::create([
            "cart_id" => Cart::where("user_id", Auth::user()->id)->first()->id,
            "product_id" => $validated["product_id"],
            "quantity" => $validated["quantity"],
        ]);
        return redirect()->back()->with("add-success", "Product successfully added to cart!");
    }

    // Display edit cart page
    public function edit(Product $product){
        $cartID = Cart::where("user_id", Auth::user()->id)->first()->id;

        return view("pages.edit-cart", [
            "product" => $product,
            "quantity" => CartDetail::where("cart_id", $cartID)->where("product_id", $product->id)->first()->quantity,
        ]);
    }

    //  Update cart item quantity
    public function update(Product $product, Request $request){
        $validated = $request->validate([
            "quantity" => 'required|numeric|gt:0',
        ]);
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id', $user_id)->first()->id;
        $product->cartDetail()->where('cart_id', $cart_id)->update([
            "quantity" => $validated["quantity"]
        ]);
        return redirect()->back();
    }

    //  Delete cart item
    public function delete(Product $product){
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id', $user_id)->first()->id;
        $product->cartDetail()->where('cart_id', $cart_id)->delete();
        return redirect()->back();
    }

    // Checkout
    public function checkout(){
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id', $user_id)->first()->id;
        $user_cart = Cart::find($cart_id);
        $cart_details = $user_cart->cartDetails();
        if($cart_details->exists()){
            // Create new transaction
            $transaction = Transaction::create([
                'user_id' => $user_id,
            ]);
            // Create an array of transaction details
            $transaction_details = [];
            foreach($cart_details->get() as $cart_detail){
                array_push($transaction_details, [
                    'product_id' => $cart_detail->product_id,
                    'quantity' => $cart_detail->quantity,
                ]);
            }
            // Insert all transaction details
            $transaction->transactionDetails()->createMany($transaction_details);
            // delete all cart details
            $cart_details->delete();
            return redirect()->back()->with('message', 'Successfully checkout!');
        } else{
            return redirect()->back()->with('message', 'There is no product in the cart!');
        }
    }
}
