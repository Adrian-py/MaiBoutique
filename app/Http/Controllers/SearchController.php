<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /*
        Display search page and handle search request
    */
    public function index(Request $request){
        $product_list = Product::paginate(8);

        if($request->search){
            $product_list = Product::where("name", "like", "%" . $request->search . "%")->paginate(8)->withQueryString();
        }

        return view("pages.search", [
            "product_list" => $product_list,
        ]);
    }
}
