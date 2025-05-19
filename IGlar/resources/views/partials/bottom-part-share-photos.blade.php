<div class="posts-container">
    <div class="posts-grid">
        @forelse($posts as $post)
            <div class="post-item">
                <a href="{{ route('posts.show', $post) }}" 
                   data-post-id="{{ $post->id }}"
                   data-image-url="{{ asset('storage/' . $post->image_path) }}"
                   data-caption="{{ $post->caption }}"
                   data-username="{{ $post->user->name }}"
                   data-likes="{{ $post->likesCount() }} likes"
                   data-time="{{ $post->created_at->diffForHumans() }}"
                   data-user-link="{{ route('profile.show', $post->user) }}">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->caption }}">
                    <div class="post-overlay">
                        <div class="post-stats">
                            <span><i class="fas fa-heart"></i> {{ $post->likesCount() }}</span>
                            <span><i class="fas fa-comment"></i> 0</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="share-photos-container">
                <div class="camera-icon">
                    <svg aria-label="Share Photos" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="62" role="img" viewBox="0 0 62 62" width="62">
                        <path d="M31 0C13.88 0 0 13.88 0 31C0 48.12 13.88 62 31 62C48.12 62 62 48.12 62 31C62 13.88 48.12 0 31 0ZM31 55.3C17.55 55.3 6.7 44.45 6.7 31C6.7 17.55 17.55 6.7 31 6.7C44.45 6.7 55.3 17.55 55.3 31C55.3 44.45 44.45 55.3 31 55.3Z" fill="currentColor"></path>
                        <path d="M43.5 29h-10V19c0-1.1-.9-2-2-2s-2 .9-2 2v10h-10c-1.1 0-2 .9-2 2s.9 2 2 2h10v10c0 1.1.9 2 2 2s2-.9 2-2V33h10c1.1 0 2-.9 2-2s-.9-2-2-2Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2>Share Photos</h2>
                <p>When you share photos, they will appear on your profile.</p>
                <a href="{{ route('add.post') }}" class="share-first-photo">Share your first photo</a>
            </div>
        @endforelse
    </div>
</div>

<style>
    .share-photos-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
        text-align: center;
        width: 100%;
    }
    
    .camera-icon {
        margin-bottom: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .share-photos-container h2 {
        font-size: 24px;
        font-weight: 600;
        margin: 0 0 8px;
        color: #f5f5f5;
    }
    
    .share-photos-container p {
        font-size: 14px;
        color: #a8a8a8;
        margin: 0 0 16px;
        max-width: 350px;
    }
    
    .share-first-photo {
        color: #0095f6;
        font-weight: 600;
        text-decoration: none;
        font-size: 14px;
    }
    
    .share-first-photo:hover {
        text-decoration: underline;
    }
</style>
