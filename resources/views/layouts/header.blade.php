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
        .gaming-bg{
            background: url('./images/gaming-bg.jpg') no-repeat center center /cover;
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

            <!-- Search Form -->
            <form action="" method="POST" class="flex-grow">
                <div class="relative flex items-center">
                    <i class="ri-search-2-line absolute ml-8 mt-2 md:ml-14 md:-mt-4 text-sm text-gray-600 pointer-events-none"></i>
                    <input class="px-8 py-1 ml-5 mt-2 md:-mt-4 md:ml-10 rounded-full md:w-96" type="text" placeholder="Search..." name="search" onkeydown="if(event.key === 'Enter'){ this.form.submit(); }">
                </div>
            </form>

            <!-- Desktop Cart/Login/Register -->
            <div class="hidden md:flex h-16">
                <div class="flex flex-col">
                    <a href="/cart" class="text-white ml-80 mt-3 text-lg hover:text-yellow-500">Cart</a>
                    <p class="absolute ml-80 -mt-6"><i class="ri-shopping-cart-line text-3xl -mt-4 text-white"></i></p>
                </div>

                <span class="text-white ml-14 md:-mt-9 border-l"></span>

                <!-- Display Username if Logged in or Show Login/Register -->
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

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="fixed bottom-0 w-full bg-white flex hidden justify-around items-center py-4 md:hidden z-10">
            <a href="/cart" class="flex flex-col items-center text-gray-700">
                <i class="ri-shopping-cart-line text-2xl text-gray-700"></i>
                <span class="text-sm">Cart</span>
            </a>

            @if (Auth::check())
                <!-- Show Username and Logout in Mobile Menu -->
                <a href="/profile" class="flex flex-col items-center text-gray-700">
                    <i class="ri-user-line text-2xl text-gray-700"></i>
                    <span class="text-sm">{{ Auth::user()->name }}</span>
                </a>
                <a href="{{ route('logout') }}" class="flex flex-col items-center text-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                    <i class="ri-logout-box-line text-2xl text-gray-700"></i>
                    <span class="text-sm">Logout</span>
                </a>
                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Show Login and Register in Mobile Menu -->
                <a href="/login" class="flex flex-col items-center text-gray-700">
                    <i class="ri-login-box-line text-2xl text-gray-700"></i>
                    <span class="text-sm">Login</span>
                </a>
                <a href="/register" class="flex flex-col  items-center text-gray-700">
                    <i class="ri-user-add-line text-2xl text-gray-700"></i>
                    <span class="text-sm">Register</span>
                </a>
            @endif
        </div>
        <!-- Back to Top Button -->
    

    <!-- Content Section -->
    <div>
        @yield('content')
    </div>

    <!-- Script to Toggle Mobile Menu -->
   
</body>
</html>
