<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view("auth.register");
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

        $newUser = User::create($validated);

        Cart::create([
            "user_id" => $newUser->id,
        ]);

        Transaction::create([
            "user_id" => $newUser->id,
        ]);

        return redirect("/login")->with("success", "Register Successful! Please Login.");
    }
}
