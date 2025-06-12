document.addEventListener('DOMContentLoaded', function() {
    // Handle post options dropdown
    document.addEventListener('click', function(event) {
        const postOptionsBtn = event.target.closest('.post-options-btn');
        
        if (postOptionsBtn) {
            event.preventDefault();
            event.stopPropagation();
            
            // Close any open dropdowns first
            document.querySelectorAll('.post-options-dropdown.show').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
            
            // Find or create dropdown for this post
            let dropdown = postOptionsBtn.parentElement.querySelector('.post-options-dropdown');
            if (!dropdown) {
                dropdown = createOptionsDropdown(postOptionsBtn);
            }
            
            // Toggle dropdown
            dropdown.classList.add('show');
            
            // Position dropdown
            positionDropdown(dropdown, postOptionsBtn);
        }
        
        // Handle delete post click
        if (event.target.matches('.delete-post-btn')) {
            event.preventDefault();
            const postId = event.target.dataset.postId;
            deletePost(postId);
        }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.post-options')) {
            document.querySelectorAll('.post-options-dropdown.show').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });
    
    function createOptionsDropdown(postOptionsBtn) {
        const postId = postOptionsBtn.dataset.postId;
        const isOwner = postOptionsBtn.dataset.isOwner === 'true';
        
        const dropdown = document.createElement('div');
        dropdown.className = 'post-options-dropdown';
        
        let options = '';
        
        if (isOwner) {
            options += `<button class="dropdown-item delete-post-btn" data-post-id="${postId}">
                <i class="fas fa-trash"></i>
                Delete
            </button>`;
        }
        
        options += `<button class="dropdown-item">
            <i class="fas fa-flag"></i>
            Report
        </button>
        <button class="dropdown-item">
            <i class="fas fa-link"></i>
            Copy Link
        </button>`;
        
        dropdown.innerHTML = options;
        postOptionsBtn.parentElement.appendChild(dropdown);
        
        return dropdown;
    }
    
    function positionDropdown(dropdown, button) {
        const buttonRect = button.getBoundingClientRect();
        const viewportWidth = window.innerWidth;
        
        // Position dropdown to the right of button, or left if not enough space
        if (buttonRect.right + 150 > viewportWidth) {
            dropdown.style.right = '0';
            dropdown.style.left = 'auto';
        } else {
            dropdown.style.left = '100%';
            dropdown.style.right = 'auto';
        }
        
        dropdown.style.top = '0';
    }
      function deletePost(postId) {
        if (!confirm('Are you sure you want to delete this post? This action cannot be undone.')) {
            return;
        }
        
        fetch(`/posts/${postId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showNotification('Post deleted successfully', 'success');
                
                // Remove post from DOM or redirect
                const postElement = document.querySelector(`[data-post-id="${postId}"]`).closest('.post-card, .single-post-card, .post-item');
                if (postElement) {
                    postElement.style.transition = 'opacity 0.3s ease';
                    postElement.style.opacity = '0';
                    setTimeout(() => {
                        postElement.remove();
                        
                        // If we're on profile page and no posts left, show no posts message
                        const postsGrid = document.querySelector('.posts-grid');
                        if (postsGrid && postsGrid.children.length === 0) {
                            postsGrid.innerHTML = `
                                <div class="no-posts-message">
                                    <h3>No Posts Yet</h3>
                                    <p>Share your first photo</p>
                                    <a href="/add-post" class="add-post-btn">Add Post</a>
                                </div>
                            `;
                        }
                    }, 300);
                }
                
                // If we're on the single post page, redirect to feed
                if (window.location.pathname.includes('/posts/') && !window.location.pathname.includes('/posts/user/')) {
                    setTimeout(() => {
                        window.location.href = '/posts';
                    }, 1500);
                }
            } else {
                showNotification('Error deleting post', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error deleting post', 'error');
        });
    }
    
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        // Style the notification
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: ${type === 'success' ? '#4CAF50' : '#f44336'};
            color: white;
            padding: 12px 20px;
            border-radius: 4px;
            z-index: 1000;
            font-size: 14px;
            font-weight: 500;
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
});
