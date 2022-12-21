<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\CartDetail;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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
        $cartItems = TransactionDetail::where("transaction_id", Transaction::where("user_id", Auth::user()->id)->first()->id)->first();

        @dd($cartItems->products);
        $totalQuantity = 0;

        foreach($cartItems as $item){
            $totalQuantity += $item->quantity;
        }

        return view("pages.cart", [
            "price" => "",
            "quantity" => $totalQuantity,
            "cartItems" => $cartItems,
        ]);
    }
}
