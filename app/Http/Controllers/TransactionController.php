<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /*

        Display transaction history page

    */
    public function index(){
        $user_id = Auth::user()->id;
        $user_transactions = Transaction::where('user_id', $user_id)->with('transactionDetails', function($query){
            return $query->with('product');
        })->addSelect([
            'total_price' => TransactionDetail::whereColumn('transaction_id', 'transactions.id')
                            ->join('products', 'transaction_details.product_id','=', 'products.id')
                            ->selectRaw('SUM(quantity * price) as total_price')
        ])->get();

        return view("pages.transaction", [
            'transactions' => $user_transactions
        ]);
    }
}
