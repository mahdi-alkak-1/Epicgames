@extends('layouts.header')

@section('content')    

<!-- Hero Section (Full-width banner) -->
<div class="hero-section relative h-screen bg-gradient-to-r from-purple-800 to-gray-900 text-white flex flex-col items-center justify-center">
    <div class="text-center">
        <h1 class="text-6xl font-bold mb-4">Welcome to Epic Games Store</h1>
        <p class="text-xl text-gray-300">Explore the best games, available now at your fingertips.</p>
        <a href="/store" class="mt-8 inline-block bg-yellow-500 text-black font-bold py-3 px-8 rounded-full hover:bg-yellow-600 transition duration-300">Explore Store</a>
    </div>
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
        <a href="#popular-games" class="text-gray-300 text-lg hover:text-yellow-500">Scroll Down</a>
        <i class="ri-arrow-down-s-line text-3xl text-gray-300 hover:text-yellow-500"></i>
    </div>
</div>

<!-- Popular Games Section -->
<section id="popular-games" class="bg-gray-900 text-white py-16 px-8 md:px-16">
    <h2 class="text-4xl font-bold text-center mb-10">Popular Games</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Game Card -->
        <div class="game-card bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105">
            <img src="./images/fortnite_skin.jpg" alt="Fortnite" class="w-full h-64  rounded-lg mb-4">
            <h3 class="text-2xl font-bold mb-2">Fortnite</h3>
            <p class="text-gray-300 mb-4">Join the battle royale phenomenon and fight to be the last one standing in Fortnite.</p>
            <a href="store" class="inline-block bg-yellow-500 text-black py-2 px-4 rounded-full hover:bg-yellow-600">Play Now</a>
        </div>
        <!-- End of Game Card -->
        <!-- Add more game cards as needed -->
    </div>
</section>

<!-- Featured Games Section -->
<section class="bg-gradient-to-r from-gray-800 to-gray-900 text-white py-16 px-8 md:px-16">
    <h2 class="text-4xl font-bold text-center mb-10">Featured Games</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Featured Game -->
        <div class="featured-game bg-gray-800 p-6 rounded-lg shadow-lg flex items-center hover:shadow-2xl transform transition-transform duration-300 hover:scale-105">
            <img src="./images/valorant.jpg" alt="Valorant" class="w-1/3 h-auto rounded-lg mr-6">
            <div>
                <h3 class="text-3xl font-bold mb-2">Valorant</h3>
                <p class="text-gray-300 mb-4">Experience the tactical shooter sensation, where every shot counts in Valorant.</p>
                <a href="store" class="inline-block bg-yellow-500 text-black py-2 px-4 rounded-full hover:bg-yellow-600">Discover</a>
            </div>
        </div>
        <!-- Add more featured games if needed -->
    </div>
</section>

<!-- Newsletter Sign-Up Section -->
<section class="bg-gray-700 text-white py-16 px-8 md:px-16 text-center">
    <h2 class="text-4xl font-bold mb-4">Stay Updated</h2>
    <p class="text-xl text-gray-300 mb-8">Sign up for our newsletter and never miss out on new game releases and deals!</p>
    <form action="#" method="POST" class="flex flex-col md:flex-row justify-center">
        <input type="email" placeholder="Enter your email" class="mb-4 md:mb-0 md:mr-4 px-4 py-3 rounded-lg w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <button type="submit" class="bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg hover:bg-yellow-600 transition duration-300">Subscribe</button>
    </form>
</section>

<!-- Footer Section -->
<footer class="bg-gray-900 text-gray-400 py-8 text-center">
    <p>&copy; 2024 Epic Games Store. All rights reserved.</p>
</footer>

@endsection
