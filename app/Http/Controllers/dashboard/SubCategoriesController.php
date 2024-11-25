<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SubCategoriesController extends Controller
{

    public function index()
    {
        $subcategories = SubCategory::with('category')->orderBy('id','asc')->simplePaginate(5);
      return view('dashboard.pages.sub_categories.index', compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.sub_categories.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        try {
            $subcategory = new Subcategory;
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;
            $subcategory->description = $request->description;

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $subcategory->image = $request->file('image')->storeAs('public/assets/uploads/SubCategories', $imageName);
            }

            $subcategory->status = $request->status;
            $subcategory->save();

            return redirect()->route('subcategories.index')->with('success', "The subcategory {$subcategory->name} has been created successfully.");

        } catch (\Exception $e) {
            return redirect()->route('subcategories.index')->with('error','An error occurred while creating the subcategory.');
        }
    }



    public function show(string $id)
    {
        $subcategory=Subcategory::find($id);
        if($subcategory== null){
          return view('dashboard.pages.categories.error.page-404');
        }

        return view('dashboard.pages.sub_categories.show', compact('subcategory'));
    }


    public function edit(string $id)
    {
        $subcategory = Subcategory::find($id);
        if ($subcategory === null) {
            return view('dashboard.pages.categories.error.page-404');
        }
else{
        if (auth()->user()->User_Type == 'admin') {
            $categories = Category::all();
            return view('dashboard.pages.sub_categories.edit', compact('subcategory', 'categories'));
        }
else{
        return view('dashboard.pages.categories.error.page-404');
    }
}
}
public function update(Request $request, $id)
{
    $subcategory = Subcategory::find($id);

    if (!$subcategory) {
        return view('dashboard.pages.categories.error.page-404');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|boolean',
    ]);


    try {
        $image = $subcategory->image;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if ($image && Storage::exists($image)) {
                    Storage::delete($image);
                }
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $image = $request->file('image')->storeAs('public/assets/uploads/SubCategories', $imageName);
            }
        }

        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image,
        ]);

        return redirect()->route('subcategories.index')->with('update', "The subcategory {$subcategory->name} has been updated successfully.");

    } catch (\Exception $e) {
        return redirect()->route('subcategories.index')->with('error','An error occurred while creating the subcategory.');
    }
}

public function destroy(string $id)
{
    try {
        $subcategory = Subcategory::find($id);
        if (!$subcategory) {
            return view('dashboard.pages.categories.error.page-404');
        }

        if ($subcategory->image && Storage::exists($subcategory->image)) {
            Storage::delete($subcategory->image);
        }

        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('delete_subcategory', 'Deleted successfully.');

    } catch (\Exception $e) {
        return redirect()->route('subcategories.index')->with('error','An error occurred while creating the subcategory.');
    }
}

public function search(Request $request){
    $categories=Category::all();
 $query=$request->input('query');
 $subcategories=Subcategory::Where('name','LIKE',"%{$query}%")
 ->orWhere('description','LIKE',"%{$query}%")
 ->orWhere('status','LIKE',$query)
->simplePaginate(5);

return view('dashboard.pages.sub_categories.index',compact('subcategories'));
}
}
