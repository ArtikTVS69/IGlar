document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to all emoji icons
    document.addEventListener('click', function(event) {
        // Check if the clicked element is an emoji icon
        if (event.target.matches('.comment-form svg') || event.target.closest('.comment-form svg')) {
            const emojiIcon = event.target.closest('.comment-form svg');
            const commentForm = emojiIcon.closest('.comment-form');
            
            // Create emoji picker popup if it doesn't exist
            if (!document.getElementById('emoji-picker')) {
                createEmojiPicker();
            }
            
            const emojiPicker = document.getElementById('emoji-picker');
            
            // Position the emoji picker near the icon
            const iconRect = emojiIcon.getBoundingClientRect();
            emojiPicker.style.left = `${iconRect.left}px`;
            emojiPicker.style.top = `${iconRect.bottom + window.scrollY}px`;
            
            // Store reference to the current comment form
            emojiPicker.dataset.targetForm = commentForm.id;
            
            // Show the emoji picker
            emojiPicker.classList.add('show');
            
            // Stop event propagation
            event.stopPropagation();
        }
    });

    // Close emoji picker when clicking elsewhere
    document.addEventListener('click', function(event) {
        const emojiPicker = document.getElementById('emoji-picker');
        if (emojiPicker && !emojiPicker.contains(event.target) && !event.target.matches('.comment-form svg') && !event.target.closest('.comment-form svg')) {
            emojiPicker.classList.remove('show');
        }
    });
    
    // Create emoji picker
    function createEmojiPicker() {
        const emojis = ['❤️', '🔥', '👏', '😍', '😂', '🎉'];
        
        const emojiPicker = document.createElement('div');
        emojiPicker.id = 'emoji-picker';
        emojiPicker.className = 'emoji-picker';
        
        emojis.forEach(emoji => {
            const emojiBtn = document.createElement('button');
            emojiBtn.className = 'emoji-btn';
            emojiBtn.textContent = emoji;
            emojiBtn.addEventListener('click', function() {
                // Find the target form using the stored reference
                const targetForm = document.getElementById(emojiPicker.dataset.targetForm);
                
                if (targetForm) {
                    // Set emoji as comment value
                    const commentInput = targetForm.querySelector('input[name="comment"]');
                    commentInput.value = emoji;
                    
                    // Submit the comment form
                    targetForm.submit();
                }
                
                // Hide the emoji picker
                emojiPicker.classList.remove('show');
            });
            
            emojiPicker.appendChild(emojiBtn);
        });
        
        document.body.appendChild(emojiPicker);
    }
    
    // Add unique IDs to all comment forms
    const commentForms = document.querySelectorAll('.comment-form');
    commentForms.forEach((form, index) => {
        form.id = `comment-form-${index}`;
    });
});
