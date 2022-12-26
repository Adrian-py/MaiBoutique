<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index(){
        $user_id = Auth::user()->id;
        $user_transactions = Transaction::where('user_id', $user_id)->with('transactionDetails', function($query){
            return $query->with('product');
        })->get();

        // dd($user_transactions);
        return view("pages.transaction", [
            'transactions' => $user_transactions
        ]);
    }
}
