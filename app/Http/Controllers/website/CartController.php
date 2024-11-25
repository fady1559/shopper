<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // تحقق مما إذا كانت الكمية المطلوبة متاحة
        $quantityRequested = $request->input('quantity', 1);
        if ($quantityRequested > $product->qty) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->selling_price,
            'quantity' => $quantityRequested,
            'attributes' => [
                'image' => $product->image,
            ]
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }


    public function showCart()
    {
        $cartItems = Cart::getContent();
        return view('website.pages.cart', compact('cartItems'));
    }

    public function removeFromCart($id)
    {
        if (!Cart::get($id)) {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }

        Cart::remove($id);
        return redirect()->back()->with('info', 'Product removed from cart!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        Cart::update($id, [
            'quantity' => ['relative' => false, 'value' => $request->input('quantity')],
        ]);

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }
}
