<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch posts for each category
        $comingSoonPosts = Post::where('category_id', 1)->get();  // Category 1: Coming Soon
        $freeToPlayPosts = Post::where('category_id', 2)->get();  // Category 2: Free to Play
        $payToPlayPosts = Post::where('category_id', 3)->get();   // Category 3: Pay to Play
    
        // Pass the posts to the view
        return view('store.index', compact('comingSoonPosts', 'freeToPlayPosts', 'payToPlayPosts'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
    
        // Return the create view with categories
        return view('store.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'available_at' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'required|image|max:2048',
        ]);
        
        // Handle image upload
       $newImageName =  $request->title . '.' . $request->image->extension();
       $request->image->move(public_path('images'), $newImageName);
       
    
        // Create the post
        Post::create([
            'title' => $validatedData['title'],
            'category_id' => $validatedData['category_id'], 
            'available_at' => $validatedData['available_at'] ?? null,
            'description' => $validatedData['description'] ?? null,
            'price' => $validatedData['price'] ?? null,
            'image' => $newImageName,
        ]);
    
        return redirect()->route('store.index')->with('success', 'Post created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('store.show')
        ->with('post', Post::where('id',$id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('store.edit')
        ->with('post',Post::where('id',$id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request to ensure all required fields are present and valid
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id', // Make sure category_id exists in the categories table
        'available_at' => 'nullable|string',
        'description' => 'nullable|string', 
        'price' => 'nullable|numeric',
    ]);

    // Update the post with validated data
    Post::where('id', $id)
        ->update([
            'title' => $validatedData['title'],
            'category_id' => $validatedData['category_id'],
            'available_at' => $validatedData['available_at'] ?? null,
            'description' => $validatedData['description'] ?? null,
            'price' => $validatedData['price'] ?? null,
        ]);

    return redirect()->route('store.show', $id)->with('message', 'Game edited successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return redirect('/store')
        ->with('messsage', 'Game deleted successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Perform the search query
        $results = Post::where('title', 'LIKE', '%' . $searchTerm . '%')->get();

        // Return the view with the search results
        return view('store.index', [
            'comingSoonPosts' => $results,  // Send the results to the view
            'freeToPlayPosts' => [],        // Send empty arrays for other categories
            'payToPlayPosts' => [],
            'searchTerm' => $searchTerm     // Pass the search term to the view for user feedback
        ]);
    }
    
    
}
