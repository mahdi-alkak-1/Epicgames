<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get the user's cart items
        $cartItems = Cart::where('user_id', Auth::id())->with('post')->get();

        // Calculate the total price of the items in the cart
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->post->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }
}
