<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($postId)
    {
        // Ensure the user is authenticated
        if (Auth::check()) {
            // Check if the item is already in the user's cart
            $cartItem = Cart::where('user_id', Auth::id())
                            ->where('post_id', $postId)
                            ->first();

            if ($cartItem) {
                // If the item is already in the cart, increase the quantity
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                // If it's not in the cart, create a new cart item
                Cart::create([
                    'user_id' => Auth::id(),
                    'post_id' => $postId,
                    'quantity' => 1,
                ]);
            }

            return redirect()->back()->with('success', 'Item added to cart!');
        }

        return redirect()->route('login')->with('error', 'You need to be logged in to add to cart');
    }

    public function showCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('post')->get();
        return view('cart.index', compact('cartItems'));
    }

        public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update([
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

}
