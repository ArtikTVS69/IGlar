@extends('layout.layout')

@section('content')
<div class="post-detail-container">
    <div class="post-detail-card">
        <div class="post-header">
            <div class="user-info">
                <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Profile" class="profile-pic">
                <a href="#" class="username">{{ $post->user->name }}</a>
            </div>
        </div>
        
        <div class="post-image">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->caption }}">
        </div>
        
        <div class="post-actions">
            <button class="action-btn"><img src="{{ asset('images/heart.png') }}" alt="Like"></button>
            <button class="action-btn"><img src="{{ asset('images/comment.png') }}" alt="Comment"></button>
        </div>
        
        <div class="post-content">
            <p><strong>{{ $post->user->name }}</strong> {{ $post->caption }}</p>
            <p class="post-time">{{ $post->created_at->diffForHumans() }}</p>
        </div>
        
        <div class="post-comments">
            <h3>Comments</h3>
            <p>No comments yet.</p>
            <!-- Comment form would go here -->
        </div>
        
        <div class="post-footer">
            <a href="{{ route('posts.index') }}" class="back-link">Back to Posts</a>
        </div>
    </div>
</div>

<style>
    .post-detail-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .post-detail-card {
        background: white;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
    }
    
    .post-header {
        padding: 10px;
        border-bottom: 1px solid #dbdbdb;
        display: flex;
        align-items: center;
    }
    
    .user-info {
        display: flex;
        align-items: center;
    }
    
    .profile-pic {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        margin-right: 10px;
    }
    
    .username {
        font-weight: 600;
        text-decoration: none;
        color: #262626;
    }
    
    .post-image img {
        width: 100%;
        max-height: 600px;
        object-fit: cover;
    }
    
    .post-actions {
        padding: 10px;
        display: flex;
    }
    
    .action-btn {
        background: none;
        border: none;
        cursor: pointer;
        margin-right: 10px;
    }
    
    .action-btn img {
        width: 24px;
        height: 24px;
    }
    
    .post-content {
        padding: 10px;
    }
    
    .post-time {
        color: #8e8e8e;
        font-size: 12px;
        margin-top: 5px;
    }
    
    .post-comments {
        padding: 10px;
        border-top: 1px solid #dbdbdb;
    }
    
    .post-footer {
        padding: 10px;
        border-top: 1px solid #dbdbdb;
    }
    
    .back-link {
        color: #0095f6;
        text-decoration: none;
    }
</style>
@endsection
