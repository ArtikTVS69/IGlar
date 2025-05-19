document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('post-modal');
    const modalImage = document.getElementById('modal-image');
    const modalCaption = document.getElementById('modal-caption');
    const modalUsername = document.getElementById('modal-username');
    const modalLikes = document.getElementById('modal-likes');
    const modalTime = document.getElementById('modal-time');
    const modalUserLink = document.getElementById('modal-user-link');
    const modalClose = document.getElementById('modal-close');
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });
    
    // Close modal when clicking the close button
    if (modalClose) {
        modalClose.addEventListener('click', function() {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        });
    }
    
    // Close modal when clicking outside of content
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    }
      // Open modal when clicking on post
    document.addEventListener('click', function(e) {
        const postItem = e.target.closest('.post-item a');
        if (postItem) {
            e.preventDefault();
            
            const postId = postItem.dataset.postId;
            const postImage = postItem.dataset.imageUrl;
            const postCaption = postItem.dataset.caption;
            const postUsername = postItem.dataset.username;
            const postLikes = postItem.dataset.likes;
            const postTime = postItem.dataset.time;
            const postUserLink = postItem.dataset.userLink;
            const fullPostLink = postItem.getAttribute('href');
            
            // Populate modal with post data
            if (modalImage) modalImage.src = postImage;
            if (modalImage) modalImage.alt = postCaption;
            if (modalCaption) modalCaption.textContent = postCaption;
            if (modalUsername) modalUsername.textContent = postUsername;
            
            // Set username in caption area too
            const modalUsernameCaptionElement = document.getElementById('modal-username-caption');
            if (modalUsernameCaptionElement) modalUsernameCaptionElement.textContent = postUsername;
            
            if (modalLikes) modalLikes.textContent = postLikes;
            if (modalTime) modalTime.textContent = postTime;
            if (modalUserLink) modalUserLink.href = postUserLink;
              // Add link to full post page and set up click handler
            const viewFullPost = document.getElementById('view-full-post');
            if (viewFullPost) {
                viewFullPost.href = fullPostLink;
                viewFullPost.dataset.postId = postId;
                viewFullPost.addEventListener('click', function(e) {
                    // Close the modal when clicking "View full post"
                    modal.classList.remove('show');
                    document.body.style.overflow = '';
                });
            }
            
            // Show modal
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent scrolling of background
        }
    });
});
