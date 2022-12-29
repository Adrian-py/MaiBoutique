<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /*

        Display login page

    */
    public function index(){
        return view("auth.login");
    }


    /*

        Handle login request

    */
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|string|min:5|max:20',
        ]);

        if(Auth::attempt($validated)){
            if($request->remember){
                Cookie::queue('useremail', $validated['email'], 60);
                Cookie::queue('userpassword', $validated['password'], 60);
            }

            return redirect(route('home'))->with('message', 'Successfully login!');
        }

        return redirect()->back()->with('message', 'Login failed, invalid credentials!');
    }
}
