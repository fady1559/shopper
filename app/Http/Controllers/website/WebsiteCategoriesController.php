<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class WebsiteCategoriesController extends Controller
{

    public function index(string $id){
        $category=Category::Select('title','description','image')->Where('id',$id)->first();
        if(!$category)
        return redirect()->route('home');

       $subcategories=Subcategory::where('category_id',$id)->where('status',1)->get();
       return view('website.pages.website-categories', compact('category' ,'subcategories'));
    }
}
