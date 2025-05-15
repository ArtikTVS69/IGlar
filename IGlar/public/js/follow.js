document.addEventListener('DOMContentLoaded', function() {
    // Follow button click handler
    document.querySelectorAll('.follow-btn').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.userId;
            
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
                if (data.success) {
                    // Update button
                    this.textContent = 'Unfollow';
                    this.classList.remove('follow-btn');
                    this.classList.add('unfollow-btn');
                    
                    // Update followers count
                    const followersElement = document.querySelector('.followers-count');
                    if (followersElement) {
                        followersElement.textContent = parseInt(followersElement.textContent) + 1;
                    }
                }
            });
        });
    });
    
    // Unfollow button click handler
    document.querySelectorAll('.unfollow-btn').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.userId;
            
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
                if (data.success) {
                    // Update button
                    this.textContent = 'Follow';
                    this.classList.remove('unfollow-btn');
                    this.classList.add('follow-btn');
                    
                    // Update followers count
                    const followersElement = document.querySelector('.followers-count');
                    if (followersElement) {
                        followersElement.textContent = Math.max(0, parseInt(followersElement.textContent) - 1);
                    }
                }
            });
        });
    });
});
