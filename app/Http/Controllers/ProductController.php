<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index(Product $product){
        return view("pages.product", [
            "product" => $product,
        ]);
    }

    public function add(){
        return view("pages.add");
    }

    public function create(Request $request){
        $validated = $request->validate([
            'image' => 'required|file|mimes:jpg,png,jpeg',
            'name' => 'required|string|min:5|max:20|unique:products',
            'description' => 'required|string|min:5',
            'price' => 'required|integer|gte:1000',
            'stock' => 'required|integer|gte:1'
        ]);
        $slug = Str::slug($validated['name']);
        $file = $request->file('image');
        $file_name = $slug . '.' . $file->extension();
        Storage::putFileAs('public/images', $file, $file_name);
        Product::create([
            'image' => 'images/' . $file_name,
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock']
        ]);
        return redirect(route('home'))->with('message', 'Successfully add an item!');
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('home'))->with('message', 'Successfully delete an item!');
    }
}
