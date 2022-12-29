<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /*

        Display register page

    */
    public function index(){
        return view("auth.register");
    }


    /*

        Handle registering new user

    */
    public function register(Request $request){
        $validated = $request->validate([
            "username" => "required|string|min:5|max:20|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required|string|min:5|max:20",
            "phone_number" => "required|digits_between:10,13",
            "address" => "required|string|min:5",
        ]);

        $validated["password"] = bcrypt($validated["password"]);
        $newUser = User::create($validated);

        Cart::create([
            "user_id" => $newUser->id,
        ]);

        return redirect("/login")->with("success", "Register Successful! Please Login.");
    }
}
