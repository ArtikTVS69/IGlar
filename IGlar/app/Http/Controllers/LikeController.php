<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function like(Post $post)
    {
        if ($post->isLikedBy(Auth::user())) {
            return response()->json(['status' => 'already_liked']);
        }
        
        Auth::user()->likedPosts()->attach($post);
        
        return response()->json([
            'status' => 'liked',
            'likes_count' => $post->fresh()->likesCount()
        ]);
    }
    
    public function unlike(Post $post)
    {
        if (!$post->isLikedBy(Auth::user())) {
            return response()->json(['status' => 'not_liked']);
        }
        
        Auth::user()->likedPosts()->detach($post);
        
        return response()->json([
            'status' => 'unliked',
            'likes_count' => $post->fresh()->likesCount()
        ]);
    }
}
