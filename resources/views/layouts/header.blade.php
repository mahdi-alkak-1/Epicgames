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

        /* Cart button */
        .cart-button {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-weight: bold;
            position: relative;
        }

        .cart-button i {
            font-size: 25px;
            color: white;
            margin-right: 10px;
        }

        .cart-button:hover {
            color: #FFD700;
        }

        /* Cart counter bubble */
        .cart-counter {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #FFD700;
            color: black;
            font-size: 12px;
            border-radius: 50%;
            padding: 2px 6px;
            font-weight: bold;
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
            <!-- Add Cart button here -->
            @if(Auth::check())
                <a href="/cart" class="cart-button">
                    <i class="ri-shopping-cart-line"></i> Cart
                    <!-- Optional: Show cart items count -->
                     <!-- Assuming you're using a package like Laravel Shopping Cart -->
                </a>
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
    
    @yield('content')

</body>
</html>
