<!-- ADD POST FORM -->
<div class="add-post-container">
    <form class="add-post-form" method="POST" action="/posts" enctype="multipart/form-data">
        <!-- IMAGE UPLOAD -->
        <label for="postImage" class="form-label">Upload Image</label>
        <input type="file" id="postImage" name="image" accept="image/*" required>

        <!-- CAPTION TEXTAREA -->
        <label for="caption" class="form-label">Caption</label>
        <textarea id="caption" name="caption" placeholder="Write a caption..." rows="3" required></textarea>

        <!-- SUBMIT BUTTON -->
        <button type="submit">Share Post</button>
    </form>
</div>
