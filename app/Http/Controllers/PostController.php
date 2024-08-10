<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $loggedUser = Auth::user();
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'is_published' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'category' => 'required|exists:categories,id',
        ]);

        // Handle file upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        // Save the post to the database
        $post = new Post();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->banner = $validated['image'] ?? null;
        $post->is_published = $validated['is_published'];
        $post->is_featured = $validated['is_featured'];
        $post->category_id = $validated['category'];
        $post->user_id = $loggedUser->id;
        $post->save();

        return response()->json(['success' => true, 'post' => $post]);
    }
}
