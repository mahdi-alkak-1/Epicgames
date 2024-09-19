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
    <div class="checkout-container mx-auto my-12 p-8 bg-gray-900 text-white rounded-lg shadow-lg max-w-5xl">
        <h1 class="text-4xl font-bold mb-8 text-center">Checkout</h1>
    
        <!-- Order Summary -->
        <div class="order-summary bg-gray-800 p-6 rounded-lg mb-8">
            <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>
    
            <div class="cart-items-container space-y-6">
                @foreach($cartItems as $item)
                    <div class="flex justify-between items-center bg-gray-700 p-4 rounded-lg">
                        <!-- Game Image -->
                        <img src="/images/{{ $item->post->image }}" alt="{{ $item->post->title }}" class="w-24 h-24 object-cover rounded-lg border-2 border-gray-600">
    
                        <!-- Game Details -->
                        <div class="flex-grow px-6">
                            <h2 class="text-xl font-semibold">{{ $item->post->title }}</h2>
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
                    </div>
                @endforeach
            </div>
    
            <div class="mt-6 flex justify-between text-xl font-bold">
                <p class="text-white">Total Price:</p>
                <p class="text-white">${{ number_format($totalPrice, 2) }}</p>
            </div>
        </div>
    
        <!-- Shipping Information -->
        <div class="shipping-info bg-gray-800 p-6 rounded-lg mb-8">
            <h2 class="text-2xl font-semibold mb-4">Shipping Information</h2>
            <form action="#" method="POST">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="full_name" class="block text-sm font-medium">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium">Address</label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" required>
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium">City</label>
                        <input type="text" id="city" name="city" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" required>
                    </div>
                    <div>
                        <label for="zip" class="block text-sm font-medium">Postal / Zip Code</label>
                        <input type="text" id="zip" name="zip" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" required>
                    </div>
                </div>
            </form>
        </div>
    
        <!-- Payment Information -->
        <div class="payment-info bg-gray-800 p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Payment Information</h2>
            <form action="#" method="POST">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="card_number" class="block text-sm font-medium">Card Number</label>
                        <input type="text" id="card_number" name="card_number" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" required>
                    </div>
                    <div>
                        <label for="expiry_date" class="block text-sm font-medium">Expiry Date</label>
                        <input type="text" id="expiry_date" name="expiry_date" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" placeholder="MM/YY" required>
                    </div>
                    <div>
                        <label for="cvv" class="block text-sm font-medium">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="mt-1 block w-full p-2 rounded-md bg-gray-700 border border-gray-600" required>
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div class="mt-8 text-center">
                    <button type="submit" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


