<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function follow(User $user)
    {
        // Prevent following yourself
        if (Auth::id() === $user->id) {
            return response()->json(['status' => 'error', 'message' => 'You cannot follow yourself']);
        }
        
        if (Auth::user()->isFollowing($user)) {
            return response()->json(['status' => 'already_following']);
        }
        
        Auth::user()->following()->attach($user);
        
        return response()->json([
            'status' => 'followed',
            'followers_count' => $user->fresh()->followers()->count()
        ]);
    }
    
    public function unfollow(User $user)
    {
        if (!Auth::user()->isFollowing($user)) {
            return response()->json(['status' => 'not_following']);
        }
        
        Auth::user()->following()->detach($user);
        
        return response()->json([
            'status' => 'unfollowed',
            'followers_count' => $user->fresh()->followers()->count()
        ]);
    }
}
