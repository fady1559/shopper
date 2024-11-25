<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
class WebsiteSubCategoriesController extends Controller
{
    public function index($id)
    {
        $subcategory = SubCategory::with('products')
                                  ->select('id','name', 'category_id', 'description', 'image')
                                  ->where('id', $id)
                                  ->where('status',1)
                                  ->first();
                                  if (!$subcategory) {
                                      return redirect()->route('home')->with('error', 'Subcategory not found.');
                                    }
                                    $products = Product::where('subcategory_id', $subcategory->id)
                                    ->where('status', 1)
                                    ->get();
                      return view('website.pages.website-subcategories', compact('subcategory', 'products'));
    }


}
