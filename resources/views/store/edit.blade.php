<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Game</title>

</head>

<body class="font-serif bg-gray-900 text-gray-100 mt-32">
    <div class="container mx-auto text-center font-bold text-3xl bg-gray-600 self-start w-max p-4 rounded-lg">
        <strong>Edit Game</strong>
    </div>
    <div class="container-b mx-auto bg-white items-center justify-center mt-20 text-3xl pt-4 space-y-10 text-center">
        <!-- Back to Store Button -->
        <div class="text-left mb-6">
            <a href="{{ route('store.index') }}" class="back-button">Back to Store</a>
        </div>

        <!-- Post Form -->
        <form id="postForm" action="/store/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Hidden Category Field (No Need to Select) -->
            <input type="hidden" name="category_id" value="{{ $post->category_id }}">

            <!-- Display the Category (Read-Only) -->
            <div class="form-group">
                <label for="category">Category: </label>
                @if($post->category_id == 1)
                    <p>Coming Soon</p>
                @elseif($post->category_id == 2)
                    <p>Free to Play</p>
                @else
                    <p>Pay to Play</p>
                @endif
            </div>

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required>
            </div>

            <!-- Description -->
            <div id="descriptionFieldPayToPlay" class="form-group">
                <label for="description">Description</label>
                <textarea name="description" required>{{ $post->description }}</textarea>
            </div>

            <!-- Specific Fields for Coming Soon -->
            @if($post->category_id == 1)
                <div id="availableAtField" class="form-group">
                    <label for="available_at">Available At</label>
                    <input type="text" name="available_at" value="{{ $post->available_at }}">
                </div>
            @endif

            <!-- Price for Pay to Play -->
            @if($post->category_id == 3)
                <div id="priceField" class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ $post->price }}" step="0.01">
                </div>
            @endif

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Update Post</button>

            <!-- Validation Error Messages -->
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>

</body>

</html>
