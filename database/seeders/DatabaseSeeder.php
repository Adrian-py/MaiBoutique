<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User with Admin Role
        User::create([
            "username" => "Admin",
            "email" => "admin@gmail.com",
            "password" => "admin123",
            "phone_number" => "081436821343",
            "address" => "Jl Ciledug Raya 8, Dki Jakarta",
            "role" => 1,
        ]);

        Product::factory()->count(100)->create();

        // Users with Member Role
        User::factory()->count(10)->create()->each(function($user){
            Cart::factory()->count(1)->state([
                "user_id" => $user->id
            ])->create()->each(function($cart){
                CartDetail::factory()->count(2)->state([
                    "cart_id" => $cart->id
                ])->create();
            });

            Transaction::factory()->count(1)->state([
                "user_id" => $user->id
            ])->create()->each(function($transaction){
                TransactionDetail::factory()->count(2)->state([
                    "transaction_id" => $transaction->id
                ])->create();
            });
        });
        // User::create([
        //     "username" => "James Martin",
        //     "email" => "james_martin@gmail.com",
        //     "password" => "password",
        //     "phone_number" => "081184567132",
        //     "address" => "Jl Gedung Ex QTA/28, Dki Jakarta",
        //     "role" => 0,
        // ]);

    }
}
