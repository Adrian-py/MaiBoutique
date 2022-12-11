<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view("pages.login", [
            "page_title" => "Login",
            "navbarActive" => false,
        ]);
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            "email" => "required|email:dns",
            "password" => "required",
        ]);

        dd("berhasil login!");
    }
}
