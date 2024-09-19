<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/script.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');  
        .gaming-bg {
            background: url('/images/gaming-bg.jpg') no-repeat center center /cover;
            background-attachment: fixed;
        }
        #popup-message {
            transform: translateY(500%);
            margin-left: 2rem;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px;
            border-radius: 10px;
            color: white;
            z-index: 50;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="font-serif gaming-bg">
    <div class="flex items-center">
        <!-- Logo -->
        <img src="/images/logo(walppaper).png" class="w-20 h-20 md:w-64 md:h-64 ml-10 mt-5 md:ml-5 md:mt-1" alt="logo">
        <a href="/" class="text-white ml-5 mt-2 md:ml-16 md:-mt-4 text-lg hover:text-cyan-500"><i class="ri-arrow-left-s-line"></i></a>

        <!-- Search Form (Common search bar across all pages) -->
        <form action="{{ route('store.search') }}" method="GET" class="flex-grow">
            <div class="relative flex items-center">
                <i class="ri-search-2-line absolute ml-8 mt-2 md:ml-14 md:-mt-4 text-sm text-gray-600 pointer-events-none"></i>
                <input class="px-8 py-1 ml-5 mt-2 md:-mt-4 md:ml-10 rounded-full md:w-96" 
                       type="text" placeholder="Search for a game..." 
                       name="search" value="{{ request()->query('search') }}">
            </div>
        </form>

        <!-- Cart/Login/Register -->
        <div class="hidden md:flex h-16">
            @if(Auth::check())
                <div class="flex flex-col">
                    <a href="/cart" class="text-white ml-80 mt-3 text-lg hover:text-yellow-500">Cart</a>
                    <p class="absolute ml-80 -mt-6"><i class="ri-shopping-cart-line text-3xl -mt-4 text-white"></i></p>
                </div>
                <span class="text-white ml-14 md:-mt-9 border-l"></span>
            @endif 
            @if (Auth::check())
                <div class="flex flex-col-reverse items-center justify-center ml-12 mb-2">
                    <a href="/profile" class="text-white text-lg hover:text-yellow-500">{{ Auth::user()->name }}</a>
                    <p class="absolute -mt-16"><i class="ri-user-line text-3xl text-white"></i></p>
                </div>
                <div class="flex flex-col-reverse items-center justify-center ml-12 mb-2">
                    <a href="{{ route('logout') }}" class="text-white text-lg hover:text-yellow-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <p class="absolute -mt-16"><i class="ri-logout-box-line text-3xl text-white"></i></p>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <div class="flex flex-col-reverse items-center justify-center ml-12 mb-2">
                    <a href="/login" class="text-white text-lg hover:text-yellow-500">Login</a>
                    <p class="absolute -mt-16"><i class="ri-login-box-line text-3xl text-white"></i></p>
                </div>
                <div class="flex flex-col-reverse items-center ml-12 mb-5">
                    <a href="/register" class="text-white text-lg hover:text-yellow-500">Register</a>
                    <p><i class="ri-user-add-line text-3xl text-white"></i></p>
                </div>
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-btn" class="md:hidden text-white ml-6 pt-2 hover:text-gray-300">
            <i class="ri-menu-fill text-2xl"></i>
        </button>
    </div>

    <!-- Content Section -->
    <div>
        @yield('content')
    </div>

</body>
</html>
