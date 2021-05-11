<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if($request->category) {
            $products = $products->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        else {
            $products->featured()->inRandomOrder()->take(12);
        }

        if($request->sort == 'low_high') {
            $products->orderBy('price', 'asc');
        }
        else if ($request->sort == 'high_low') {
            $products->orderBy('price', 'desc');
        }

        $products = $products->paginate(12);

        $categories = Category::all();

        $categoryName = optional(Category::findBySlug($request->category))->name ?? 'Featured';

        return view('shop', compact('products', 'categories', 'categoryName'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $mightLike = Product::where('slug', '!=', $product->slug)->mightLike()->get();

        return view('product', compact('product', 'mightLike'));
    }
}
