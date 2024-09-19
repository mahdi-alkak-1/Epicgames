<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/script.js')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    
    <div class="cart-container mx-auto my-12 p-8 bg-gray-900 text-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-8 text-center text-white">Your Shopping Cart</h1>
        
         <!-- Back to Store Button -->
        <div class="mb-6">
            <a href="{{ route('store.index') }}" class="back-to-store-btn px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all">
                ← Back to Store
            </a>
        </div>

        @if($cartItems->isEmpty())
            <p class="text-center text-2xl font-light">Your cart is empty.</p>
        @else
            <div class="cart-items-container space-y-6">
                @foreach($cartItems as $item)
                    <div class="cart-item flex justify-between items-center bg-gray-800 p-6 rounded-lg shadow-lg transition-transform hover:scale-105">
                        <!-- Game Image -->
                        <img src="/images/{{ $item->post->image }}" alt="{{ $item->post->title }}" class="w-32 h-32 object-cover rounded-lg border-2 border-gray-700">
    
                        <!-- Game Details -->
                        <div class="flex-grow px-6">
                            <h2 class="text-2xl font-semibold text-white">{{ $item->post->title }}</h2>
                            <p class="text-gray-400 mt-2">Price: ${{ number_format($item->post->price, 2) }}</p>
                        </div>
    
                        <!-- Quantity -->
                        <div class="text-xl font-semibold">
                            Quantity: {{ $item->quantity }}
                        </div>
    
                        <!-- Total Price -->
                        <div class="text-xl font-semibold">
                            Total: ${{ number_format($item->post->price * $item->quantity, 2) }}
                        </div>
    
                        <!-- Remove Button -->
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="remove-btn px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>
    
            <!-- Cart Summary -->
            <div class="cart-summary mt-12 p-6 bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold text-white mb-4">Order Summary</h2>
                <div class="flex justify-between text-lg">
                    <p class="text-gray-400">Subtotal</p>
                    <p class="text-white">${{ number_format($cartItems->sum(fn($item) => $item->post->price * $item->quantity), 2) }}</p>
                </div>
    
                <div class="flex justify-between text-lg mt-2">
                    <p class="text-gray-400">Tax (10%)</p>
                    <p class="text-white">${{ number_format($cartItems->sum(fn($item) => $item->post->price * $item->quantity) * 0.1, 2) }}</p>
                </div>
    
                <div class="flex justify-between text-xl font-bold mt-4 text-white">
                    <p>Total</p>
                    <p>${{ number_format($cartItems->sum(fn($item) => $item->post->price * $item->quantity) * 1.1, 2) }}</p>
                </div>
    
                <!-- Checkout Button -->
                <div class="mt-8 text-center">
                    <a href="{{ route('checkout') }}" class="checkout-btn px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">Proceed to Checkout</a>
                </div>
            </div>
        @endif
    </div>

</body>
</html>