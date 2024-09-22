<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/script.js')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background: linear-gradient(135deg, #1f1c2c, #928DAB);
            font-family: 'Roboto', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }

        /* Header styling */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header img {
            width: 100px;
            cursor: pointer;
        }

        .search-bar-container {
            flex-grow: 1;
            margin-left: 20px;
            position: relative;
        }

        .search-bar-container input {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            border-radius: 25px;
            border: none;
            outline: none;
            padding-left: 40px;
            font-size: 16px;
        }

        .search-bar-container .ri-search-2-line {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
        }

        /* User menu and cart icons */
        .user-menu {
            display: flex;
            align-items: center;
        }

        .user-menu a {
            margin-left: 20px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            position: relative;
        }

        .user-menu a:hover {
            color: #FFD700;
        }

        .user-menu .icon {
            font-size: 25px;
            color: white;
        }

        .user-menu .icon:hover {
            color: #FFD700;
        }

        /* Game grid */
        .game-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .game-card {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .game-card:hover {
            transform: scale(1.05);
        }

        .game-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .game-details {
            margin-top: 15px;
        }

        .game-details h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .game-details span {
            display: block;
            font-size: 14px;
            color: #CCC;
            margin-bottom: 10px;
        }

        .button {
            background-color: #FFD700;
            color: black;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ffcc00;
        }

        /* Back button styling */
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f4e04d;
            color: #333;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #ffd700;
        }

        /* Media query for responsiveness */
        @media screen and (max-width: 768px) {
            .game-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .header img {
                width: 80px;
            }

            .search-bar-container input {
                max-width: 100%;
            }

            .user-menu {
                flex-direction: column;
                align-items: flex-start;
            }

            .user-menu a {
                margin-left: 0;
                margin-bottom: 10px;
            }

            .back-button {
                margin-top: 40px;
            }
        }

        /* Footer styling */
        footer {
            padding: 20px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            margin-top: 40px;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Store</title>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <a href="/">
            <img src="/images/logo(walppaper).png" alt="logo">
        </a>

        <!-- Search Bar -->
        <div class="search-bar-container">
            <i class="ri-search-2-line"></i>
            <form action="{{ route('store.search') }}" method="GET">
                <input type="text" name="search" placeholder="Search for games..." value="{{ request()->query('search') }}">
            </form>
        </div>

        <!-- User Menu -->
        <div class="user-menu">
            @if(Auth::check())
                <a href="/cart" class="icon"><i class="ri-shopping-cart-line"></i></a>
                <a href="/profile">{{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="/login"><i class="ri-login-box-line icon"></i> Login</a>
                <a href="/register"><i class="ri-user-add-line icon"></i> Register</a>
            @endif
        </div>
    </div>

    <!-- Game Grid -->
    <div class="game-grid">
        <!-- Coming Soon Section -->
        @foreach($comingSoonPosts as $post)
            <div class="game-card">
                <img src="/images/{{ $post->image }}" alt="{{ $post->title }}" class="game-image">
                <div class="game-details">
                    <h3>{{ $post->title }}</h3>
                    <span>Available At: {{ $post->available_at }}</span>
                    <a href="/store/{{ $post->id }}" class="button">More Info</a>
                </div>
            </div>
        @endforeach

        <!-- Free to Play Section -->
        @foreach ($freeToPlayPosts as $post)
            <div class="game-card">
                <img src="/images/{{ $post->image }}" alt="{{ $post->title }}" class="game-image">
                <div class="game-details">
                    <h3>{{ $post->title }}</h3>
                    <a href="/store/{{ $post->id }}" class="button">Get Free</a>
                </div>
            </div>
        @endforeach

        <!-- Pay to Play Section -->
        @foreach ($payToPlayPosts as $post)
            <div class="game-card">
                <img src="/images/{{ $post->image }}" alt="{{ $post->title }}" class="game-image">
                <div class="game-details">
                    <h3>{{ $post->title }}</h3>
                    <span>Price: ${{ $post->price }}</span>
                    <a href="/store/{{ $post->id }}" class="button">Buy Now</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Back Button to Store -->
    <div class="text-center">
        <a href="/" class="back-button">Back to Store</a>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 Game Store. All Rights Reserved.
    </footer>

</body>
</html>
