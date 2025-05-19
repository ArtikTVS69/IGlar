@extends('layout.layout')

@section('content')
<div class="single-post-container">
    <div class="single-post-card">
        <div class="post-header">
            <div class="user-info">
                <div class="avatar-container">
                    <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Profile" class="profile-pic">
                </div>
                <div class="user-details">
                    <a href="{{ route('profile.show', $post->user) }}" class="username">{{ $post->user->name }}</a>
                </div>
            </div>
            <div class="post-options">
                <svg aria-label="More options" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><circle cx="12" cy="12" r="1.5"></circle><circle cx="6" cy="12" r="1.5"></circle><circle cx="18" cy="12" r="1.5"></circle></svg>
            </div>
        </div>
        
        <div class="post-image">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->caption }}">
        </div>
        
        <div class="post-actions">
            <div class="left-actions">
                @auth
                    <button class="action-btn like-button" data-post-id="{{ $post->id }}" data-liked="{{ $post->isLikedBy(Auth::user()) ? 'true' : 'false' }}">
                        @if($post->isLikedBy(Auth::user()))
                            <svg aria-label="Unlike" color="rgb(255, 48, 64)" fill="rgb(255, 48, 64)" height="24" role="img" viewBox="0 0 48 48"><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>
                        @else
                            <svg aria-label="Like" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                        @endif
                    </button>
                @else
                    <button class="action-btn">
                        <svg aria-label="Like" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218a4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127a6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018a2 2 0 0 0 2.174 0a45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                    </button>
                @endauth
                <button class="action-btn comment-btn">
                    <svg aria-label="Comment" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path></svg>
                </button>
                <button class="action-btn">
                    <svg aria-label="Share Post" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line><polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                </button>
            </div>
            <div class="right-actions">
                <button class="action-btn">
                    <svg aria-label="Save" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                </button>
            </div>
        </div>
        
        <div class="post-content">
            <div class="likes">
                <span class="likes-count">{{ $post->likesCount() }}</span> likes
            </div>
            <div class="caption">
                <span class="username">{{ $post->user->name }}</span>
                <span class="caption-text">{{ $post->caption }}</span>
            </div>
        </div>
        
        <div class="comments-section">
            <!-- Comments would go here -->
            <div class="no-comments">
                <p>No comments yet. Be the first to comment.</p>
            </div>
        </div>
        <div class="post-time">
            {{ $post->created_at->format('F j, Y') }}
        </div>
        
        <form class="comment-form" action="#" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <svg aria-label="Emoji" color="rgb(168, 168, 168)" fill="rgb(168, 168, 168)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M15.83 10.997a1.167 1.167 0 1 0 1.167 1.167 1.167 1.167 0 0 0-1.167-1.167Zm-6.5 1.167a1.167 1.167 0 1 0-1.166 1.167 1.167 1.167 0 0 0 1.166-1.167Zm5.163 3.24a3.406 3.406 0 0 1-4.982.007 1 1 0 1 0-1.557 1.256 5.397 5.397 0 0 0 8.09 0 1 1 0 0 0-1.55-1.263ZM12 .503a11.5 11.5 0 1 0 11.5 11.5A11.513 11.513 0 0 0 12 .503Zm0 21a9.5 9.5 0 1 1 9.5-9.5 9.51 9.51 0 0 1-9.5 9.5Z"></path></svg>
            <input type="text" name="comment" placeholder="Add a comment..." required>
            <button type="submit">Post</button>
        </form>
    </div>
    
    <div class="back-to-feed">
        <a href="{{ route('posts.index') }}" class="back-link">Back to Feed</a>
        <a href="{{ route('profile.show', $post->user) }}" class="back-link">Back to Profile</a>
    </div>
</div>

<style>
    .single-post-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .single-post-card {
        background-color: #000;
        border: 1px solid #262626;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        border-bottom: 1px solid #262626;
    }
    
    .user-info {
        display: flex;
        align-items: center;
    }
    
    .avatar-container {
        margin-right: 12px;
    }
    
    .profile-pic {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .user-details .username {
        font-weight: 600;
        color: #f5f5f5;
        text-decoration: none;
    }
    
    .post-image {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: #000;
    }
    
    .post-image img {
        width: 100%;
        max-height: 600px;
        object-fit: contain;
    }
    
    .post-actions {
        display: flex;
        justify-content: space-between;
        padding: 12px 16px;
    }
    
    .left-actions, .right-actions {
        display: flex;
    }
    
    .action-btn {
        background: none;
        border: none;
        padding: 8px;
        margin-right: 8px;
        cursor: pointer;
    }
    
    .post-content {
        padding: 0 16px 12px;
    }
    
    .likes {
        font-weight: 600;
        color: #f5f5f5;
        margin-bottom: 8px;
    }
    
    .caption {
        margin-bottom: 10px;
        color: #f5f5f5;
    }
    
    .caption .username {
        font-weight: 600;
        margin-right: 5px;
    }
    
    .comments-section {
        padding: 0 16px;
        max-height: 300px;
        overflow-y: auto;
        border-top: 1px solid #262626;
        color: #f5f5f5;
    }
    
    .no-comments {
        padding: 20px 0;
        color: #8e8e8e;
        text-align: center;
    }
    
    .post-time {
        padding: 0 16px;
        color: #8e8e8e;
        font-size: 12px;
        margin-top: 5px;
        margin-bottom: 10px;
    }
    
    .comment-form {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        border-top: 1px solid #262626;
    }
    
    .comment-form svg {
        margin-right: 12px;
    }
    
    .comment-form input {
        flex: 1;
        border: none;
        background-color: transparent;
        color: #f5f5f5;
        padding: 8px 0;
        outline: none;
    }
    
    .comment-form input::placeholder {
        color: #8e8e8e;
    }
    
    .comment-form button {
        background: none;
        border: none;
        color: #0095f6;
        font-weight: 600;
        cursor: pointer;
    }
    
    .comment-form button:disabled {
        opacity: 0.3;
    }
    
    .back-to-feed {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 24px;
    }
    
    .back-link {
        display: inline-block;
        padding: 8px 16px;
        background-color: #0095f6;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.2s;
    }
    
    .back-link:hover {
        background-color: #0074cc;
    }
</style>
@endsection
