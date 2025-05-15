@extends('layout.layout')

@section('content')
<div class="posts-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(count($posts) > 0)
        <div class="stories-container">
            <div class="story">
                <div class="story-avatar">
                    <div class="story-border">
                        <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Story">
                    </div>
                </div>
                <span>Your Story</span>
            </div>
            <div class="story">
                <div class="story-avatar">
                    <div class="story-border">
                        <img src="{{ asset('images/AdoPulcPFP.png') }}" alt="Story">
                    </div>
                </div>
                <span>ado_pulc</span>
            </div>
            <div class="story">
                <div class="story-avatar">
                    <div class="story-border">
                        <img src="{{ asset('images/KikoLiptakPFP.jpg') }}" alt="Story">
                    </div>
                </div>
                <span>kiko_liptak</span>
            </div>
            <div class="story">
                <div class="story-avatar">
                    <div class="story-border">
                        <img src="{{ asset('images/pdtPFP.png') }}" alt="Story">
                    </div>
                </div>
                <span>pdt</span>
            </div>
        </div>

        <div class="posts">
            @foreach($posts as $post)
                <div class="post-card">
                    <div class="post-header">
                        <div class="user-info">
                            <div class="avatar-container">
                                <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Profile" class="profile-pic">
                            </div>                            <div class="user-details">
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
                                    <svg aria-label="Like" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                                </button>
                            @endauth
                            <button class="action-btn">
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
                    
                    <div class="post-content">                        <div class="likes">
                            <span class="likes-count">{{ $post->likesCount() }}</span> likes
                        </div>
                        <div class="caption">
                            <span class="username">{{ $post->user->name }}</span>
                            <span class="caption-text">{{ $post->caption }}</span>
                        </div>                        <div class="comments-link">
                            <a href="{{ route('posts.show', $post) }}">View all comments</a>
                        </div>
                        <div class="post-time">
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                    
                    <form class="comment-form" action="#" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <svg aria-label="Emoji" color="rgb(168, 168, 168)" fill="rgb(168, 168, 168)" height="13" role="img" viewBox="0 0 24 24" width="13"><path d="M15.83 10.997a1.167 1.167 0 1 0 1.167 1.167 1.167 1.167 0 0 0-1.167-1.167Zm-6.5 1.167a1.167 1.167 0 1 0-1.166 1.167 1.167 1.167 0 0 0 1.166-1.167Zm5.163 3.24a3.406 3.406 0 0 1-4.982.007 1 1 0 1 0-1.557 1.256 5.397 5.397 0 0 0 8.09 0 1 1 0 0 0-1.55-1.263ZM12 .503a11.5 11.5 0 1 0 11.5 11.5A11.513 11.513 0 0 0 12 .503Zm0 21a9.5 9.5 0 1 1 9.5-9.5 9.51 9.51 0 0 1-9.5 9.5Z"></path></svg>
                        <input type="text" name="comment" placeholder="Add a comment..." required>
                        <button type="submit">Post</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-posts">
            <div class="no-posts-icon">
                <svg aria-label="" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="64" role="img" viewBox="0 0 24 24" width="64"><path d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455" y1="12.001" y2="12.001"></line><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003" y1="6.545" y2="17.455"></line></svg>
            </div>
            <h2>Share Photos</h2>
            <p>When you share photos, they will appear on your profile.</p>
            <a href="{{ route('add.post') }}" class="share-link">Share your first photo</a>
        </div>
    @endif
</div>

<style>
    .posts-container {
        max-width: 470px;
        margin: 20px auto;
        padding: 0 10px;
    }
    
    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        background-color: #2f3136;
        color: #f5f5f5;
    }
    
    /* Stories */
    .stories-container {
        display: flex;
        overflow-x: auto;
        padding: 10px 0;
        background-color: #000;
        border: 1px solid #262626;
        border-radius: 8px;
        margin-bottom: 24px;
    }
    
    .story {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 10px;
        cursor: pointer;
    }
    
    .story-avatar {
        width: 66px;
        height: 66px;
        position: relative;
    }
    
    .story-border {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(to right, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
        padding: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .story-border img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 2px solid #000;
        object-fit: cover;
    }
    
    .story span {
        margin-top: 5px;
        font-size: 12px;
        color: #f5f5f5;
        max-width: 70px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    /* Posts */
    .post-card {
        background: #000;
        border: 1px solid #262626;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    
    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    
    .user-info {
        display: flex;
        align-items: center;
    }
    
    .avatar-container {
        width: 32px;
        height: 32px;
        margin-right: 10px;
    }
    
    .profile-pic {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .user-details {
        display: flex;
        flex-direction: column;
    }
    
    .username {
        font-weight: 600;
        color: #f5f5f5;
        text-decoration: none;
        font-size: 14px;
    }
    
    .post-options svg {
        cursor: pointer;
    }
    
    .post-image {
        width: 100%;
        max-height: 587px;
        overflow: hidden;
    }
    
    .post-image img {
        width: 100%;
        object-fit: cover;
    }
    
    .post-actions {
        display: flex;
        justify-content: space-between;
        padding: 8px 12px;
    }
    
    .left-actions, .right-actions {
        display: flex;
    }
    
    .action-btn {
        background: none;
        border: none;
        padding: 8px;
        cursor: pointer;
    }
    
    .post-content {
        padding: 0 12px 12px;
    }
    
    .likes {
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
        color: #f5f5f5;
    }
    
    .caption {
        margin-bottom: 8px;
        font-size: 14px;
        color: #f5f5f5;
    }
    
    .caption-text {
        margin-left: 5px;
    }
    
    .comments-link {
        margin-bottom: 6px;
    }
    
    .comments-link a {
        color: #a8a8a8;
        font-size: 14px;
        text-decoration: none;
    }
    
    .post-time {
        font-size: 10px;
        color: #a8a8a8;
        text-transform: uppercase;
    }
    
    .comment-form {
        display: flex;
        align-items: center;
        padding: 10px 12px;
        border-top: 1px solid #262626;
    }
    
    .comment-form input {
        flex: 1;
        border: none;
        outline: none;
        padding: 0 10px;
        font-size: 14px;
        background-color: transparent;
        color: #f5f5f5;
    }
    
    .comment-form button {
        background: none;
        border: none;
        color: #0095f6;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
    }
    
    /* No posts view */
    .no-posts {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #000;
        border: 1px solid #262626;
        border-radius: 8px;
        padding: 40px 20px;
        text-align: center;
    }
    
    .no-posts-icon {
        margin-bottom: 20px;
    }
    
    .no-posts h2 {
        font-size: 22px;
        font-weight: 300;
        margin-bottom: 10px;
        color: #f5f5f5;
    }
    
    .no-posts p {
        color: #a8a8a8;
        margin-bottom: 20px;
    }
    
    .share-link {
        background-color: #0095f6;
        color: #f5f5f5;
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 600;
        text-decoration: none;
        font-size: 14px;
    }
</style>
@endsection
