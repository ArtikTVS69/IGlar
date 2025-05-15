@extends('layout.layout')

@section('content')
<div class="create-post-container">
    <div class="create-post-card">
        <div class="create-post-header">
            <h2>Create New Post</h2>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data" class="post-form">
            @csrf
            
            <div class="form-grid">
                <div class="form-preview">
                    <div class="upload-area" id="uploadArea">
                        <svg aria-label="Icon to represent media such as images or videos" color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="77" role="img" viewBox="0 0 97.6 77.3" width="96"><path d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z" fill="currentColor"></path><path d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z" fill="currentColor"></path><path d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z" fill="currentColor"></path></svg>
                        <h3>Drag photos and videos here</h3>
                        <label for="image" class="select-button">Select from computer</label>
                        <input type="file" name="image" id="image" class="hidden-file-input" accept="image/*" required>
                    </div>
                    <div class="image-preview" id="imagePreview" style="display: none;">
                        <img src="#" alt="Preview" id="previewImg">
                    </div>
                </div>
                
                <div class="form-details">
                    <div class="form-caption">
                        <label for="caption">Caption</label>
                        <textarea name="caption" id="caption" placeholder="Write a caption..." required>{{ old('caption') }}</textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn-share">Share</button>
                        <a href="{{ route('posts.index') }}" class="btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image');
        const uploadArea = document.getElementById('uploadArea');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        fileInput.addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadArea.style.display = 'none';
                    imagePreview.style.display = 'block';
                }
                
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    });
</script>

<style>
    .create-post-container {
        max-width: 870px;
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .create-post-card {
        background: #000;
        border: 1px solid #262626;
        border-radius: 4px;
        overflow: hidden;
    }
    
    .create-post-header {
        padding: 10px 16px;
        border-bottom: 1px solid #262626;
        text-align: center;
    }
    
    .create-post-header h2 {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
        color: #f5f5f5;
    }
    
    .alert {
        padding: 10px 16px;
        margin: 10px;
        border-radius: 5px;
    }
    
    .alert-danger {
        background-color: #2c1a1a;
        color: #f5f5f5;
        border: 1px solid #442222;
    }
    
    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .post-form {
        display: flex;
        flex-direction: column;
    }
    
    .form-grid {
        display: flex;
        height: 550px;
    }
    
    .form-preview {
        flex: 1;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #121212;
        border-right: 1px solid #262626;
    }
    
    .form-details {
        width: 350px;
        display: flex;
        flex-direction: column;
    }
    
    .upload-area {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        width: 100%;
        height: 100%;
    }
    
    .upload-area h3 {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: 300;
        color: #f5f5f5;
    }
    
    .hidden-file-input {
        display: none;
    }
    
    .select-button {
        background-color: #0095f6;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
    }
    
    .image-preview {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #000;
    }
    
    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .form-caption {
        padding: 16px;
        flex: 1;
    }
    
    .form-caption label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 14px;
        color: #f5f5f5;
    }
    
    .form-caption textarea {
        width: 100%;
        height: 200px;
        padding: 8px;
        border: 1px solid #262626;
        border-radius: 4px;
        resize: none;
        font-size: 14px;
        background-color: #000;
        color: #f5f5f5;
    }
    
    .form-actions {
        padding: 16px;
        border-top: 1px solid #262626;
        display: flex;
        justify-content: flex-end;
    }
    
    .btn-share {
        background-color: #0095f6;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
    }
    
    .btn-cancel {
        background-color: #262626;
        color: #f5f5f5;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        margin-left: 10px;
    }
    
    @media (max-width: 768px) {
        .form-grid {
            flex-direction: column;
            height: auto;
        }
        
        .form-preview {
            height: 350px;
            border-right: none;
            border-bottom: 1px solid #262626;
        }
        
        .form-details {
            width: 100%;
        }
    }
</style>
@endsection
            
            <div class="form-caption">
                <label for="caption">Caption</label>
                <textarea name="caption" id="caption" placeholder="Write a caption..." required>{{ old('caption') }}</textarea>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-share">Share</button>
                <a href="{{ route('posts.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image');
        const uploadArea = document.getElementById('uploadArea');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        fileInput.addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadArea.style.display = 'none';
                    imagePreview.style.display = 'block';
                }
                
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    });
</script>

<style>
    .create-post-container {
        max-width: 700px;
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .create-post-card {
        background: white;
        border: 1px solid #dbdbdb;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .create-post-header {
        padding: 10px 16px;
        border-bottom: 1px solid #dbdbdb;
        text-align: center;
    }
    
    .create-post-header h2 {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
    }
    
    .alert {
        padding: 10px 16px;
        margin: 10px;
        border-radius: 5px;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .post-form {
        display: flex;
        flex-direction: column;
    }
    
    .form-preview {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fafafa;
        border-bottom: 1px solid #dbdbdb;
    }
    
    .upload-area {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        width: 100%;
        height: 100%;
    }
    
    .upload-area h3 {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: 300;
    }
    
    .hidden-file-input {
        display: none;
    }
    
    .select-button {
        background-color: #0095f6;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
    }
    
    .image-preview {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .form-caption {
        padding: 16px;
        border-bottom: 1px solid #dbdbdb;
    }
    
    .form-caption label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 14px;
    }
    
    .form-caption textarea {
        width: 100%;
        height: 80px;
        padding: 8px;
        border: 1px solid #dbdbdb;
        border-radius: 4px;
        resize: none;
        font-size: 14px;
    }
    
    .form-actions {
        display: flex;
        justify-content: flex-end;
        padding: 16px;
    }
    
    .btn-share {
        background-color: #0095f6;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
    }
    
    .btn-cancel {
        background-color: #efefef;
        color: #262626;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        margin-left: 10px;
    }
</style>
@endsection
