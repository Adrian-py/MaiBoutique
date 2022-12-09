<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view("pages.register", [
            "page_title" => "Register",
            "navbarFlag" => false,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "username" => "required|min:5|max:255|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required",
            "phone" => "required|numeric",
            "address" => "required",
        ]);

        return redirect("/");
    }
}
