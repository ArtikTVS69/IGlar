@extends('layout.layout')

@section('content')
<div class="post-detail-container">
    <div class="post-detail-card">
        <div class="post-detail-wrapper">
            <div class="post-image-container">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->caption }}">
            </div>
            
            <div class="post-info-container">
                <div class="post-header">
                    <div class="user-info">
                        <div class="avatar-container">
                            <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Profile" class="profile-pic">
                        </div>
                        <div class="user-details">
                            <a href="#" class="username">{{ $post->user->name }}</a>
                        </div>
                    </div>
                    <div class="post-options">
                        <svg aria-label="More options" class="x1lliihq x1n2onr6" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24"><circle cx="12" cy="12" r="1.5"></circle><circle cx="6" cy="12" r="1.5"></circle><circle cx="18" cy="12" r="1.5"></circle></svg>
                    </div>
                </div>
                
                <div class="post-comments-container">
                    <div class="post-caption">
                        <div class="user-info">
                            <div class="avatar-container">
                                <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Profile" class="profile-pic">
                            </div>
                            <div class="comment-content">
                                <span class="username">{{ $post->user->name }}</span>
                                <span class="caption-text">{{ $post->caption }}</span>
                                <div class="comment-time">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="comments-section">
                        <!-- Comments would go here -->
                        <div class="no-comments">
                            <p>No comments yet. Be the first to comment.</p>
                        </div>
                    </div>
                </div>
                
                <div class="post-actions-container">
                    <div class="post-actions">
                        <div class="left-actions">
                            <button class="action-btn">
                                <svg aria-label="Like" class="x1lliihq x1n2onr6" color="rgb(38, 38, 38)" fill="rgb(38, 38, 38)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                            </button>
                            <button class="action-btn">
                                <svg aria-label="Comment" class="x1lliihq x1n2onr6" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path></svg>
                            </button>
                            <button class="action-btn">
                                <svg aria-label="Share Post" class="x1lliihq x1n2onr6" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24"><line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line><polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                            </button>
                        </div>
                        <div class="right-actions">
                            <button class="action-btn">
                                <svg aria-label="Save" class="x1lliihq x1n2onr6" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24"><polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon></svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="post-likes">
                        <span>0 likes</span>
                    </div>
                    
                    <div class="post-time">
                        {{ $post->created_at->format('F j, Y') }}
                    </div>
                    
                    <div class="comment-form">
                        <svg aria-label="Emoji" class="x1lliihq x1n2onr6" color="rgb(115, 115, 115)" fill="rgb(115, 115, 115)" height="24" role="img" viewBox="0 0 24 24" width="24"><path d="M15.83 10.997a1.167 1.167 0 1 0 1.167 1.167 1.167 1.167 0 0 0-1.167-1.167Zm-6.5 1.167a1.167 1.167 0 1 0-1.166 1.167 1.167 1.167 0 0 0 1.166-1.167Zm5.163 3.24a3.406 3.406 0 0 1-4.982.007 1 1 0 1 0-1.557 1.256 5.397 5.397 0 0 0 8.09 0 1 1 0 0 0-1.55-1.263ZM12 .503a11.5 11.5 0 1 0 11.5 11.5A11.513 11.513 0 0 0 12 .503Zm0 21a9.5 9.5 0 1 1 9.5-9.5 9.51 9.51 0 0 1-9.5 9.5Z"></path></svg>
                        <input type="text" placeholder="Add a comment...">
                        <button>Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="back-to-feed">
        <a href="{{ route('posts.index') }}" class="back-link">Back to Posts</a>
    </div>
</div>

<style>
    .post-detail-container {
        max-width: 935px;
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .post-detail-card {
        background: white;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
        overflow: hidden;
    }
    
    .post-detail-wrapper {
        display: flex;
        min-height: 450px;
    }
    
    .post-image-container {
        flex: 1;
        background-color: #000;
        max-width: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .post-image-container img {
        max-width: 100%;
        max-height: 600px;
        object-fit: contain;
    }
    
    .post-info-container {
        width: 335px;
        display: flex;
        flex-direction: column;
        border-left: 1px solid #dbdbdb;
    }
    
    .post-header {
        padding: 14px 16px;
        border-bottom: 1px solid #dbdbdb;
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        color: #262626;
        text-decoration: none;
        font-size: 14px;
    }
    
    .post-options svg {
        cursor: pointer;
    }
    
    .post-comments-container {
        flex: 1;
        overflow-y: auto;
        padding: 16px;
    }
    
    .post-caption {
        margin-bottom: 16px;
    }
    
    .comment-content {
        font-size: 14px;
        display: flex;
        flex-direction: column;
    }
    
    .caption-text {
        margin-left: 5px;
    }
    
    .comment-time {
        font-size: 10px;
        color: #8e8e8e;
        margin-top: 5px;
    }
    
    .comments-section {
        margin-top: 20px;
    }
    
    .no-comments {
        color: #8e8e8e;
        font-size: 14px;
        text-align: center;
        padding: 20px 0;
    }
    
    .post-actions-container {
        border-top: 1px solid #dbdbdb;
    }
    
    .post-actions {
        display: flex;
        justify-content: space-between;
        padding: 8px 16px;
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
    
    .post-likes {
        padding: 0 16px;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 8px;
    }
    
    .post-time {
        padding: 0 16px;
        color: #8e8e8e;
        font-size: 10px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    
    .comment-form {
        display: flex;
        align-items: center;
        padding: 16px;
        border-top: 1px solid #efefef;
    }
    
    .comment-form svg {
        margin-right: 10px;
    }
    
    .comment-form input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 14px;
    }
    
    .comment-form button {
        background: none;
        border: none;
        color: #0095f6;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
    }
    
    .back-to-feed {
        margin-top: 20px;
        text-align: center;
    }
    
    .back-link {
        color: #0095f6;
        text-decoration: none;
        font-weight: 600;
    }
    
    @media (max-width: 935px) {
        .post-detail-wrapper {
            flex-direction: column;
        }
        
        .post-image-container {
            max-width: 100%;
        }
        
        .post-info-container {
            width: 100%;
            border-left: none;
            border-top: 1px solid #dbdbdb;
        }
    }
</style>
@endsection
