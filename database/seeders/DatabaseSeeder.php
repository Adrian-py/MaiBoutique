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

        Product::factory()->count(20)->create();

        // Users with Member Role
        User::factory()->count(10)->create()->each(function($user){
            $cart = Cart::factory()->count(1)->state([
                "user_id" => $user->id
            ])->create();
            // ->has(CartDetail::factory()->count(2)->state(function(array $attributes, Cart $cart){
            //     return ["cart_id" => $cart->id];
            // }))->create();

            CartDetail::factory()->count(2)->for($cart)->create();
        });

        // User::create([
        //     "username" => "James Martin",
        //     "email" => "james_martin@gmail.com",
        //     "password" => "password",
        //     "phone_number" => "081184567132",
        //     "address" => "Jl Gedung Ex QTA/28, Dki Jakarta",
        //     "role" => 0,
        // ]);


        // CartDetail::factory()->count(10)->create();
        // TransactionDetail::factory()->count(10)->create();
    }
}
