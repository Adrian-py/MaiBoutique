<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
      ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, "transaction_id");
    }

    public function products(){
        return $this->hasMany(Product::class, "product_id");
    }
}
