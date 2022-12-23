<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, TransactionDetail::class, 'transaction_id', 'id', 'id', 'product_id');
    }
}
