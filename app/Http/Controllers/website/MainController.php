<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function home(){
        $categories = Category::select('id','title','image')->get();
        $subcategories = SubCategory::select('id','name', 'category_id','image')->where('status',1)->get();

        $products = Product::where('status', 1)
                    ->whereHas('subcategory', function($query) {
                        $query->where('status', 1);
                    })
                    ->select('id','name', 'short_description', 'selling_price', 'image')
                    ->get();

        return view('website.pages.home', compact('categories','subcategories', 'products'));
    }

    public function catalog(){
        $products = Product::where('status', 1)
                    ->whereHas('subcategory', function($query) {
                        $query->where('status', 1);
                    })
                    ->select('id','name', 'short_description', 'selling_price', 'image')
                    ->get();

        return view('website.pages.catalog', compact('products'));
    }

    public function catalogSearch(Request $request) {
        $query = $request->input('query');

        $products = Product::where(function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'LIKE', "%{$query}%")
                                    ->orWhere('short_description', 'LIKE', "%{$query}%")
                                    ->orWhere('description', 'LIKE', "%{$query}%")
                                    ->orWhere('meta_title', 'LIKE', "%{$query}%")
                                    ->orWhere('meta_description', 'LIKE', "%{$query}%")
                                    ->orWhere('meta_keywords', 'LIKE', "%{$query}%");
                    })
                    ->where('status', 1)
                    ->whereHas('subcategory', function($query) {
                        $query->where('status', 1);
                    })
                    ->simplePaginate(12);

        $subcategories = SubCategory::select('name', 'category_id', 'image')->where('status',1)->get();

        return view('website.pages.catalog', compact('products', 'subcategories', 'query'));
    }

    public function about(){
        return view('website.pages.about');
    }

    public function contact(){
        return view('website.pages.contact');
    }

    public function new_arrivals()
    {
        $newProducts = Product::where('created_at', '>=', now()->subDays(30))
                              ->where('status', 1)
                              ->whereHas('subcategory', function($query) {
                                  $query->where('status', 1);
                              })
                              ->select('id', 'name', 'short_description', 'selling_price', 'image')
                              ->get();

        return view('website.pages.new-arrivals', compact('newProducts'));
    }

    public function newArrivalsSearch(Request $request) {
        $query = $request->input('query');

        $newProducts = Product::where('created_at', '>=', now()->subDays(30))
                              ->where('status', 1)
                              ->whereHas('subcategory', function($query) {
                                  $query->where('status', 1);
                              })
                              ->where(function($queryBuilder) use ($query) {
                                  $queryBuilder->where('name', 'LIKE', "%{$query}%")
                                               ->orWhere('short_description', 'LIKE', "%{$query}%")
                                               ->orWhere('description', 'LIKE', "%{$query}%")
                                               ->orWhere('meta_title', 'LIKE', "%{$query}%")
                                               ->orWhere('meta_description', 'LIKE', "%{$query}%")
                                               ->orWhere('meta_keywords', 'LIKE', "%{$query}%");
                              })
                              ->simplePaginate(12);

        return view('website.pages.new-arrivals', compact('newProducts', 'query'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('website.pages.profile', compact('user'));
    }

    public function edit_profile(string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id !== (int) $id) {
            return redirect()->route('website.profile')->with('Auth', 'You do not have permission to edit this profile.');
        }

        return view('website.pages.edit-profile', compact('user'));
    }

    public function update_profile(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id !== (int) $id) {
            return redirect()->route('website.profile')->with('error', 'You do not have permission to update this profile.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $user->image;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if ($image) {
                    Storage::delete($image);
                }
                $image = $request->file('image')->store('public/assets/uploads/Users');
            }
        }

        $user->image = $image;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('website.profile')->with('success', 'Profile updated successfully.');
    }
}
