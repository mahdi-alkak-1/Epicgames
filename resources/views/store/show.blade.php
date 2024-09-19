<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/script.js')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>

    <!-- Custom Styling -->
    <style>
        /* Main Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Modern Typography */
        h1 {
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            color: #ffffff;
            letter-spacing: 1.5px;
            font-size: 3rem;
        }

        /* Image Styling */
        .game-image {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }

        .game-image:hover {
            transform: scale(1.03);
        }

        /* Description and Info */
        .game-description {
            background-color: #1f2937;
            color: #e5e7eb;
            font-size: 1.2rem;
            line-height: 1.8;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Buttons Styling */
        .btn {
            display: inline-block;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            transform: translateY(-5px);
        }

        .back-button {
            background-color: #6366f1;
            color: white;
        }

        .back-button:hover {
            background-color: #4f46e5;
        }

        .buy-button {
            background-color: #f59e0b;
            color: white;
        }

        .buy-button:hover {
            background-color: #d97706;
        }

        .free-button {
            background-color: #34d399;
            color: white;
        }

        .free-button:hover {
            background-color: #059669;
        }

        .coming-soon-button {
            background-color: #fbbf24;
            color: black;
        }

        .coming-soon-button:hover {
            background-color: #d97706;
        }

        /* Edit Button */
        .edit-button {
            background-color: #10b981;
            color: white;
        }

        .edit-button:hover {
            background-color: #059669;
        }

        /* Spacing for content sections */
        .content-section {
            text-align: center;
            margin-top: 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .btn {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100">    
    
    
    @if(session('message'))
        <div class="success-message" id="successMessage">
            {{ session('message') }}
        </div>
    @endif
    <!-- Back to Store Button -->
    <div class="container mt-6">
        <a href="{{ route('store.index') }}" class="btn back-button">Back to Store</a>
    </div>

    <!-- Game Title -->
    <div class="container text-center mt-12">
        <h1>{{ $post->title }}</h1>
    </div>

    <!-- Game Image -->
    <div class="container content-section">
        <img src="/images/{{ $post->image }}" alt="Game Image" class="game-image">
    </div>

    <!-- Game Description and Info -->
    <div class="container game-description">
        <p>{{ $post->description }}</p>
        @if($post->available_at)
            <p class="mt-4">Available At: {{ $post->available_at }}</p>
        @endif
    </div>

    <div class=" ml-[340px] w-max mt-4">
        @if(Auth::check())
            <form action="{{ route('cart.add', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="add-to-cart-button ">Add to Cart</button>
            </form>
        @endif
    </div>
   


    <!-- Pricing and Action Buttons -->
    <div class="container text-center content-section">
        @if($post->category_id == 3)
            <a href="#" class="btn buy-button">Buy Now: ${{ $post->price }}</a>
        @endif

        @if($post->category_id == 2)
            @if($post->title == "Fortnite")
                <a href="https://store.epicgames.com/en-US/download" class="btn free-button">Get for Free</a>
            @else    
                <a href="#" class="btn free-button">Get for Free</a>
            @endif
        @endif

        @if($post->category_id == 1)
            <div class="btn coming-soon-button">Stay Tuned!</div>
        @endif
    </div>

    <!-- Edit Button -->
    @if(Auth::check() && Auth::user()->is_admin)

        <div class="container flex text-center justify-center space-x-6 content-section">
            <a href="{{ route('store.edit', $post->id) }}" class="btn edit-button">Edit Game</a>
            <form action="/store/{{ $post->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn delete-button">Delete Game</button>
            </form> 
        </div>
    @endif

    
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById("successMessage");
        if (successMessage) {
            // Show the message with a slide down effect
            setTimeout(() => {
                successMessage.classList.add('show');
            }, 100); // Delay to allow initial load

            // Hide the message after 5 seconds
            setTimeout(() => {
                successMessage.style.opacity = '0';
                successMessage.style.top = '0';
            }, 5000);
        }
    });
</script>