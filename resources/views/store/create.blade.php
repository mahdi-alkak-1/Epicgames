<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>

</head>
<body class="font-serif bg-gray-900 text-gray-100  mt-32">
    <div class="container mx-auto text-center font-bold text-3xl bg-gray-600 self-start w-max p-4 rounded-lg">
        <strong>Create Game</strong>
    </div>
    <div class="container-b mx-auto bg-white items-center justify-center mt-20 text-3xl pt-4 space-y-10 text-center">
        <!-- Back to Store Button -->
        <div class="text-left mb-6">
            <a href="{{ route('store.index') }}" class="back-button">Back to Store</a>
        </div>
    
        <!-- Post Form (rest of your form here) -->

        <!-- Post Form -->
        <form id="postForm" action="/store" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Category Selection -->
            <div class="form-group">
                <label for="category">Choose Category</label>
                <select id="category" name="category_id" onchange="showForm()" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="1">Coming Soon</option>
                    <option value="2">Free to Play</option>
                    <option value="3">Pay to Play</option>
                </select>
            </div>

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" required>
            </div>

             <!-- Description for Coming Soon -->
             <div id="descriptionFieldComingSoon" class="form-group hidden">
                <label for="description">Description</label>
                <textarea name="description" placeholder="Enter description"></textarea>
            </div>
             <!-- Description for Free to Play -->
             <div id="descriptionFieldFreeToPlay" class="form-group hidden">
                <label for="description">Description</label>
                <textarea name="description" placeholder="Enter description"></textarea>
            </div>
            <!-- Description for Pay to Play -->
            <div id="descriptionFieldPayToPlay" class="form-group hidden">
                <label for="description">Description</label>
                <textarea name="description" placeholder="Enter description"></textarea>
            </div>

            <!-- Specific Fields for Coming Soon -->
            <div id="availableAtField" class="form-group hidden">
                <label for="available_at">Available At</label>
                <input type="text" name="available_at" placeholder="Enter availability date">
            </div>

            <!-- Price for Pay to Play -->
            <div id="priceField" class="form-group hidden">
                <label for="price">Price</label>
                <input type="number" name="price" placeholder="Enter the price" step="0.01">
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Create Post</button>

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

    <script>
        function showForm() {
            const category = document.getElementById('category').value;

            // Hide all category-specific fields initially
            document.getElementById('availableAtField').classList.add('hidden');
            document.getElementById('descriptionFieldPayToPlay').classList.add('hidden');
            document.getElementById('descriptionFieldFreeToPlay').classList.add('hidden');                      
            document.getElementById('descriptionFieldComingSoon').classList.add('hidden');
            document.getElementById('priceField').classList.add('hidden');

            // Show fields based on selected category
            if (category == '1') {
                document.getElementById('availableAtField').classList.remove('hidden');
                document.getElementById('descriptionFieldComingSoon').classList.remove('hidden');
            }else if (category == '2'){
                document.getElementById('descriptionFieldFreeToPlay').classList.remove('hidden');
            }
             else if (category == '3') {
                document.getElementById('descriptionFieldPayToPlay').classList.remove('hidden');
                document.getElementById('priceField').classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
