<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index(){
        return view('pages.profile.profile');
    }

    public function editProfile(){
        return view('pages.profile.edit-profile');
    }

    public function updateProfile(Request $request){
        $user_id = Auth::user()->id;
        $validated = $request->validate([
            "username" => "required|string|min:5|max:20|unique:users,username," . $user_id,
            "email" => "required|email:dns|unique:users,email," . $user_id,
            "phone_number" => "required|digits_between:10,13",
            "address" => "required|string|min:5",
        ]);

        User::where('id', $user_id)->update([
            "username" => $validated["username"],
            "email" => $validated["email"],
            "phone_number" => $validated["phone_number"],
            "address" => $validated["address"]
        ]);

        return redirect(route('view-profile'))->with("success", "Successfully edited profile!");
    }

    public function editPassword(){
        return view('pages.profile.edit-password');
    }

    public function updatePassword(Request $request){
        $validated = $request->validate([
            "old_password" => "required|string|min:5|max:20|current_password",
            "new_password" => "required|string|min:5|max:20"
        ]);

        $validated["new_password"] = bcrypt($validated["new_password"]);

        $user_id = Auth::user()->id;
        User::where('id', $user_id)->update([
            "password" => $validated["new_password"]
        ]);

        return redirect(route('view-profile'))->with("success", "Successfully changed password!");
    }
}
