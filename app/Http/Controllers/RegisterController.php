<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view("pages.register", [
            "page_title" => "Register",
            "navbarActive" => false,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "username" => "required|min:5|max:255|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required",
            "phone_number" => "required|numeric",
            "address" => "required",
        ]);

        $validated["password"] = bcrypt($validated["password"]);

        User::create($validated);

        return redirect("/login")->with("success", "Register Successful! Please Login.");
    }
}
