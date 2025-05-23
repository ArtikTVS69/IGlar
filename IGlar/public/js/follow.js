document.addEventListener('DOMContentLoaded', function() {
    // Using event delegation for all follow/unfollow buttons
    document.addEventListener('click', function(event) {
        // Follow button click handler
        if (event.target.matches('.follow-btn')) {
            const userId = event.target.dataset.userId;
            
            // Send AJAX request
            fetch(`/user/${userId}/follow`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'followed') {
                    // Update button
                    event.target.textContent = 'Unfollow';
                    event.target.classList.remove('follow-btn');
                    event.target.classList.add('unfollow-btn');
                    
                    // Update followers count
                    const followersElement = document.querySelector('.info2 p:nth-child(2) strong');
                    if (followersElement) {
                        followersElement.textContent = data.followers_count;
                    }
                }
            });
        }
        
        // Unfollow button click handler
        if (event.target.matches('.unfollow-btn')) {
            const userId = event.target.dataset.userId;
            
            // Send AJAX request
            fetch(`/user/${userId}/unfollow`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'unfollowed') {
                    // Update button
                    event.target.textContent = 'Follow';
                    event.target.classList.remove('unfollow-btn');
                    event.target.classList.add('follow-btn');
                    
                    // Update followers count
                    const followersElement = document.querySelector('.info2 p:nth-child(2) strong');
                    if (followersElement) {
                        followersElement.textContent = data.followers_count;
                    }
                }
            });
        }
    });
});
