<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        // Require authentication for all methods except index and show
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display all posts on the main page
     */
    public function index()
    {
        $posts = Post::with('user', 'likes')->latest()->get();
        return view('posts.index', compact('posts'));
    }
    
    /**
     * Display posts from users the authenticated user follows
     */
    public function feed()
    {
        // Get IDs of users the authenticated user follows
        $followingIds = Auth::user()->following()->pluck('users.id');
        
        // Get posts from followed users and the authenticated user
        $posts = Post::whereIn('user_id', $followingIds)
                    ->orWhere('user_id', Auth::id())
                    ->with('user', 'likes')
                    ->latest()
                    ->get();
                    
        return view('posts.index', compact('posts'));
    }
    
    /**
     * Display posts from a specific user
     */
    public function userPosts(\App\Models\User $user)
    {
        $posts = $user->posts()->with('user', 'likes')->latest()->get();
        return view('posts.user_posts', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new post
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caption' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Create post
        Auth::user()->posts()->create([
            'caption' => $validatedData['caption'],
            'image_path' => $imagePath
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified post
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
