<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories=Category::orderBy('id','asc')->simplePaginate(7);
      return view('dashboard.pages.categories.index' , compact('categories'));
    }


    public function create()
    {
        return view('dashboard.pages.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|unique:categories,title|max:255',
            'description'     => 'nullable|string|max:1080',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'create_user_id'  => 'nullable|exists:users,id',
            'update_user_id'  => 'nullable|exists:users,id'
        ]);

        try {
            $category = new Category;
            $category->title = $request->title;
            $category->description = $request->description;

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $category->image = $request->file('image')->storeAs('public/assets/uploads/Categories', $imageName);
                        }

            $category->create_user_id = auth()->user()->id;
            $category->update_user_id = null;
            $category->save();

            return redirect()->route('categories.index')->with('success', "The Category {$category->title} Has Been Created Successfully");

        } catch (\Exception $e) {
            return view('dashboard.pages.categories.error.page-404');
        }
    }


    public function show(string $id)
    {
          $category=Category::find($id);
          if($category== null){
            return view('dashboard.pages.categories.error.page-404');
          }
          return view('dashboard.pages.categories.show',compact('category'));
     }


    public function edit(string $id)
    {
        $category=Category::find($id);
        if($category==null){
         return view('dashboard.pages.categories.error.page-404');
        }
        else{

            if(auth()->user()->User_Type=='admin'){
             return view('dashboard.pages.categories.edit', compact('category'));

              }
        else{
            return view('dashboard.pages.categories.error.page-404');
        }
        }
    }


    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        $request->validate([
            'title'           => 'required|string|max:255|unique:categories,title,' . $id,
            'description'     => 'nullable|string|max:1080',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'create_user_id'  => 'nullable|exists:users,id',
            'update_user_id'  => 'nullable|exists:users,id'
        ]);

        try {
            $imagePath = $category->image;

            if ($request->hasFile('image')) {
                if ($category->image && Storage::exists($category->image)) {
                    Storage::delete($category->image);
                }
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('public/assets/uploads/Categories', $imageName);
            }

            $category->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
                'create_user_id' => $category->create_user_id ?? auth()->user()->id,
                'update_user_id' => auth()->user()->id
            ]);

            return redirect()->route('categories.index')->with('update', "The category {$category->title} has been updated");

        } catch (\Exception $e) {
            return view('dashboard.pages.categories.error.page-404');
        }
    }

public function destroy(string $id)
{
    $category = Category::find($id);
    if (!$category || auth()->user()->User_Type!='admin') {
        return view('dashboard.pages.categories.error.page-404');
    }

    try {
        if ($category->image && Storage::exists($category->image)) {
            Storage::delete($category->image);
        }

        $categoryTitle = $category->title;
        $category->delete();

        return redirect()->route('categories.index')->with('delete', "The category '{$categoryTitle}' has been deleted successfully");

    } catch (\Exception $e) {
        return view('dashboard.pages.categories.error.page-404');
    }
}

public function search(Request $request){
    $query = $request->input('query');
$categories=Category::Where('title','LIKE',"%{$query}%")
->orWhere('description','LIKE',"%{$query}%") ->simplePaginate(12);
return view('dashboard.pages.categories.index',compact('categories'))->simplePaginate(12);
}
}
