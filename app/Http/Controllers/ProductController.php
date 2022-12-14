<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Product $product){
        // dd($product);
        return view("pages.detail", [
            "page_title" =>"Product " . $product->name,
            "navbarActive" => true,
            "product" => $product,
        ]);
    }
}
