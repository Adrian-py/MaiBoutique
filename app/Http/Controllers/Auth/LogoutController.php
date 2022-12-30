<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    /*

        Handle logout request

    */
    public function logout(){
        Auth::logout();

        // remove user cookies
        Cookie::queue(Cookie::forget('useremail'));
        Cookie::queue(Cookie::forget('userpassword'));

        return redirect(route('home'))->with('message', 'Successfully log out!');
    }
}
