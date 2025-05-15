@extends('layout.layout')

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <img src="{{ asset('images/DefaultProfPic.png') }}" alt="{{ $user->name }}" class="profile-avatar-img">
        </div>
        
        <div class="profile-info">
            <div class="profile-username">
                <h1>{{ $user->name }}</h1>
                
                @if(Auth::check() && Auth::id() !== $user->id)
                    <div class="follow-button-container">
                        @if($isFollowing)
                            <button class="unfollow-btn" data-user-id="{{ $user->id }}">Unfollow</button>
                        @else
                            <button class="follow-btn" data-user-id="{{ $user->id }}">Follow</button>
                        @endif
                    </div>
                @endif
            </div>
            
            <div class="profile-stats">
                <div class="stat">
                    <span class="stat-count">{{ $posts->count() }}</span> posts
                </div>
                <div class="stat">
                    <span class="stat-count followers-count">{{ $followersCount }}</span> followers
                </div>
                <div class="stat">
                    <span class="stat-count">{{ $followingCount }}</span> following
                </div>
            </div>
        </div>
    </div>
    
    <div class="profile-posts">
        <div class="posts-header">
            <h2>Posts</h2>
        </div>
        
        <div class="posts-grid">
            @forelse($posts as $post)
                <div class="post-thumbnail">
                    <a href="{{ route('posts.show', $post) }}">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->caption }}">
                        <div class="post-overlay">
                            <div class="post-stats">
                                <div class="stat">
                                    <i class="fas fa-heart"></i> {{ $post->likesCount() }}
                                </div>
                                <div class="stat">
                                    <i class="fas fa-comment"></i> 0
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="no-posts">
                    <p>No posts yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .profile-container {
        max-width: 935px;
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .profile-header {
        display: flex;
        margin-bottom: 44px;
    }
    
    .profile-avatar {
        width: 150px;
        height: 150px;
        margin-right: 30px;
    }
    
    .profile-avatar-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .profile-info {
        flex: 1;
    }
    
    .profile-username {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .profile-username h1 {
        font-size: 28px;
        font-weight: 300;
        margin: 0;
        margin-right: 20px;
        color: #ffffff;
    }
    
    .follow-button-container {
        margin-left: 20px;
    }
    
    .follow-btn, .unfollow-btn {
        padding: 6px 16px;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
        border: none;
    }
    
    .follow-btn {
        background-color: #0095f6;
        color: white;
    }
    
    .unfollow-btn {
        background-color: #262626;
        color: white;
    }
    
    .profile-stats {
        display: flex;
        margin-bottom: 20px;
    }
    
    .stat {
        margin-right: 40px;
        font-size: 16px;
        color: #ffffff;
    }
    
    .stat-count {
        font-weight: bold;
    }
    
    .posts-header {
        border-top: 1px solid #262626;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    
    .posts-header h2 {
        font-size: 12px;
        font-weight: 600;
        color: #ffffff;
        text-transform: uppercase;
        margin-top: 15px;
        letter-spacing: 1px;
    }
    
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }
    
    .post-thumbnail {
        position: relative;
        aspect-ratio: 1/1;
    }
    
    .post-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .post-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .post-thumbnail:hover .post-overlay {
        opacity: 1;
    }
    
    .post-stats {
        display: flex;
        color: white;
    }
    
    .post-stats .stat {
        margin: 0 10px;
        font-weight: bold;
    }
    
    .post-stats i {
        margin-right: 5px;
    }
    
    .no-posts {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px 0;
        color: #a8a8a8;
        font-size: 14px;
    }
    
    @media (max-width: 735px) {
        .profile-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .profile-avatar {
            margin-right: 0;
            margin-bottom: 15px;
        }
        
        .profile-username {
            flex-direction: column;
        }
        
        .profile-username h1 {
            margin-right: 0;
            margin-bottom: 10px;
        }
        
        .profile-stats {
            justify-content: center;
        }
        
        .posts-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 3px;
        }
    }
    
    @media (max-width: 480px) {
        .posts-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
