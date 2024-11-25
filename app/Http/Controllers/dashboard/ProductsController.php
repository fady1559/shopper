<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
class ProductsController extends Controller

{

    public function index()
    {
        $products = Product::with('subcategory')->orderBy('id','asc')->simplePaginate(5);
      return view('dashboard.pages.products.index', compact('products'));
    }


    public function create()
    {
        $subcategories = Subcategory::all();
        return view('dashboard.pages.products.create',compact('subcategories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id'     => 'required|exists:subcategories,id',
            'name'               => 'required|string|max:255',
            'short_description'  => 'required|string|max:500',
            'description'        => 'required|string',
            'image'              => 'nullable|image|max:2048',
            'price'              => 'required|numeric|min:0',
            'selling_price'      => 'required|numeric|min:0',
            'qty'                => 'required|integer|min:0',
            'tax'                => 'required|numeric|min:0|max:100',
            'meta_title'         => 'required|string|max:255',
            'meta_keywords'      => 'nullable|string|max:500',
            'meta_description'   => 'nullable|string',
        ]);

        try {
            $product = new Product;
            $product->subcategory_id = $request->subcategory_id;
            $product->name = $request->name;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->selling_price = $request->selling_price;
            $product->qty = $request->qty;
            $product->tax = $request->tax;
            $product->status = $request->status ? '1' : '0';
            $product->trend = $request->trend ? '1' : '0';
            $product->meta_title = $request->meta_title;
            $product->meta_keywords = $request->meta_keywords;
            $product->meta_description = $request->meta_description;

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $product->image = $request->file('image')->storeAs('public/assets/uploads/Product', $imageName);
            }

            $product->save();

            return redirect()->route('products.index')->with('success_create_product', "The product {$product->name} has been created successfully.");

        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error','An error occurred while creating the product: ' . $e->getMessage());
        }
    }



    public function show(string $id)
    {
        $product=Product::find($id);   // model name
        if($product== null){
          return view('dashboard.pages.categories.error.page-404');
        }
        return view('dashboard.pages.products.show',compact('product'));
    }

    public function edit(string $id)
    {
        $subcategories = Subcategory::all();
        $product=Product::find($id);
        if($product==null){
            return view('dashboard.pages.categories.error.page-404');
        }

        else{

            if(auth()->user()->User_Type=='admin'){

                return view('dashboard.pages.products.edit', compact('product','subcategories'));

              }

        else{

            return view('dashboard.pages.categories.error.page-404');
        }

        }
    }
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return view('dashboard.pages.categories.error.page-404');
        }

        $request->validate([
            'subcategory_id'     => 'required|exists:subcategories,id',
            'name'               => 'required|string|max:255',
            'short_description'  => 'required|string|max:500',
            'description'        => 'required|string',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'              => 'required|numeric|min:0',
            'selling_price'      => 'required|numeric|min:0',
            'qty'                => 'required|integer|min:0',
            'tax'                => 'required|numeric|min:0|max:100',
            'meta_title'         => 'required|string|max:255',
            'meta_keywords'      => 'nullable|string|max:500',
            'meta_description'   => 'nullable|string',
        ]);

        try {
            $imagePath = $product->image;

            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    if ($imagePath && Storage::exists($imagePath)) {
                        Storage::delete($imagePath);
                    }
                    $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                    $imagePath = $request->file('image')->storeAs('public/assets/uploads/Product', $imageName);
                }
            }

            $product->update([
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'price' => $request->price,
                'selling_price' => $request->selling_price,
                'image' => $imagePath,
                'qty' => $request->qty,
                'tax' => $request->tax,
                'status' => $request->status ? '1' : '0',
                'trend' => $request->trend ? '1' : '0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('products.index')->with('success_update_product', 'Product updated successfully.');

        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'An error occurred while updating the product: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->withErrors('Product not found.');
        }

        try {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $product->delete();

            return redirect()->route('products.index')->with('delete_product', 'Product deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'An error occurred while deleting the product: ' . $e->getMessage());
        }
    }
    
    public function search(Request $request){
        $query=$request->input('query');
        $products=Product::Where('name','LIKE',"%{$query}%")
        ->orWhere('short_description','LIKE',"%{$query}%")
        ->orWhere('description','LIKE',"%{$query}%")
        ->orWhere('status','LIKE',$query)
        ->orWhere('trend','LIKE',$query)
        ->orWhere('meta_title','LIKE',"%{$query}%")
        ->orWhere('meta_keywords','LIKE',"%{$query}%")
        ->orWhere('meta_description','LIKE',"%{$query}%")
        ->orWhereHas('subcategory',function($q)use($query){
            $q->Where('name','LIKE',"%{$query}%");
        })->simplepaginate(5);
        return view('dashboard.pages.products.index',compact('products'));
    }
}
