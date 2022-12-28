<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*
        Display product detail page
    */
    public function index(Product $product){
        return view("pages.product", [
            "product" => $product,
        ]);
    }


    /*
        Display add product page
    */
    public function add(){
        return view("pages.add-item");
    }

    /*
        Validate and store new item
    */
    public function store(Request $request){
        $validated = $request->validate([
            "image" => "required|mimes:jpg,png,jpeg",
            "name" => "required|unique:products|min:5|max:20",
            "description" => "required|min:5",
            "price" => "required|integer|min:1000",
            "stock" => "required|integer|min:1",
        ]);

        @dd($validated);
    }
}
