<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cartDetails(){
        return $this->hasMany(CartDetail::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, CartDetail::class, 'cart_id', 'id', 'id', 'product_id');
    }

    // Retrieve cart of current logged in user
    public function scopeCurrent($query){
        return $query->where("user_id", "=", Auth::user()->id);
    }
}
