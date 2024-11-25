<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class ShopController extends Controller
{
    // عرض صفحة المتجر
    public function shop(){
        $categories = Category::all();
        $subcategories = SubCategory::select('id','name', 'category_id', 'image')
                                    ->where('status', 1)
                                    ->get();

        $products = Product::where('status', 1)
                           ->whereHas('subcategory', function($query) {
                               $query->where('status', 1);
                           })
                           ->select('id','name', 'short_description', 'selling_price', 'image')
                           ->simplePaginate(12);

        return view('website.pages.products.shop', compact('categories','subcategories', 'products'));
    }

    public function shop_single($id){
        $product = Product::where('status', 1)
                          ->whereHas('subcategory', function($query) {
                              $query->where('status', 1);
                          })
                          ->findOrFail($id);

        $relatedProducts = Product::where('subcategory_id', $product->subcategory_id)
                                  ->where('id', '!=', $product->id)
                                  ->where('status', 1)
                                  ->whereHas('subcategory', function($query) {
                                      $query->where('status', 1);
                                  })
                                  ->get();

        return view('website.pages.products.shop-single', compact('relatedProducts', 'product'));
    }

    public function search(Request $request) {
        $query = $request->input('query');

        $categories = Category::all();
        $subcategories = SubCategory::select('id','name', 'category_id', 'image')
                                    ->where('status', 1)
                                    ->get();

        $products = Product::where('status', 1)
                           ->where(function($queryBuilder) use ($query) {
                               $queryBuilder->where('name', 'LIKE', "%{$query}%")
                                            ->orWhere('short_description', 'LIKE', "%{$query}%")
                                            ->orWhere('description', 'LIKE', "%{$query}%")
                                            ->orWhere('meta_title', 'LIKE', "%{$query}%")
                                            ->orWhere('meta_description', 'LIKE', "%{$query}%")
                                            ->orWhere('meta_keywords', 'LIKE', "%{$query}%")
                                            ->orWhereHas('subcategory', function($q) use ($query) {
                                                $q->where('name', 'LIKE', "%{$query}%")
                                                  ->where('status', 1);
                                            });
                           })
                           ->whereHas('subcategory', function($query) {
                               $query->where('status', 1);
                           })
                           ->simplePaginate(12);

        return view('website.pages.products.shop', compact('categories','subcategories', 'products', 'query'));
    }
}
