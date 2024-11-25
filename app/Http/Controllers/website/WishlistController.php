<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
class WishlistController extends Controller
{
    public function add(Request $request, $productId)
{
    $userId = Auth::id();

    try {
        if (Wishlist::where('user_id', $userId)->where('product_id', $productId)->exists()) {
            return redirect()->back()->with('info', 'Product already in wishlist!');
        }

        $wishlist = new Wishlist;
        $wishlist->user_id = $userId;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }
    catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while adding the product to the wishlist.');
    }
}


    public function index()
    {
        $userId = Auth::id();
        $wishlists = Wishlist::with('product')->where('user_id', $userId)->get();

        return view('website.pages.wishlists', compact('wishlists'));
    }

    public function remove($id)
    {
        $userId = Auth::id();
        $wishlist = Wishlist::where('id', $id)->where('user_id', $userId)->first();

        if (!$wishlist) {
            return redirect()->back()->with('error', 'Wishlist item not found or you do not have permission to delete it.');
        }

        $wishlist->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }
}
