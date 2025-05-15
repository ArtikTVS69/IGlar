<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'posts' => $user->posts()->latest()->get(),
            'followersCount' => $user->followers()->count(),
            'followingCount' => $user->following()->count(),
            'isFollowing' => Auth::check() ? Auth::user()->isFollowing($user) : false
        ]);
    }
}
