<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*

        Display home page

    */
    public function index()
    {
        return view('pages.home', [
            "productList" => Product::paginate(8),
        ]);
    }
}
