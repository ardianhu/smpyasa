<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        $featured = Post::where('is_featured', 1)->get();
        return view('clients.beranda', compact('posts', 'featured'));
    }
}
