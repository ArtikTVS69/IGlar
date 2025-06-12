@extends('layout.layout')

@section('content')
<div class="edit-profile-container">
    <div class="edit-profile-header">
        <h2>Edit Profile</h2>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data" class="edit-profile-form">
        @csrf
        @method('PUT')
        
        <div class="form-section">
            <div class="profile-picture-section">
                <div class="current-picture">
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="profile-pic-preview">
                    @else
                        <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Default Profile Picture" class="profile-pic-preview">
                    @endif
                </div>
                <div class="picture-upload">
                    <h3>{{ $user->name }}</h3>
                    <label for="profile_picture" class="change-photo-btn">Change profile photo</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="hidden-file-input">
                </div>
            </div>
        </div>

        <div class="form-section">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            <small class="help-text">Help people discover your account by using the name you're known by: either your full name, nickname, or business name.</small>
        </div>

        <div class="form-section">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
            <small class="help-text">
                <span id="bio-count">{{ strlen($user->bio ?? '') }}</span>/150
            </small>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">Submit</button>
            <a href="{{ route('profile.show', $user) }}" class="cancel-btn">Cancel</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Profile picture preview
    const profilePictureInput = document.getElementById('profile_picture');
    const profilePicPreview = document.querySelector('.profile-pic-preview');
    
    profilePictureInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Bio character counter
    const bioTextarea = document.getElementById('bio');
    const bioCounter = document.getElementById('bio-count');
    
    bioTextarea.addEventListener('input', function() {
        const currentLength = this.value.length;
        bioCounter.textContent = currentLength;
        
        if (currentLength > 150) {
            bioCounter.style.color = '#ed4956';
            this.style.borderColor = '#ed4956';
        } else {
            bioCounter.style.color = '#8e8e8e';
            this.style.borderColor = '#dbdbdb';
        }
    });
});
</script>

<style>
    .edit-profile-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 0 20px;
    }
    
    .edit-profile-header {
        text-align: center;
        padding: 20px 0;
        border-bottom: 1px solid #262626;
        margin-bottom: 30px;
    }
    
    .edit-profile-header h2 {
        font-size: 20px;
        font-weight: 600;
        color: #f5f5f5;
        margin: 0;
    }
    
    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        border: 1px solid;
    }
    
    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }
    
    .alert ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .edit-profile-form {
        background-color: #000;
        border: 1px solid #262626;
        border-radius: 8px;
        padding: 30px;
    }
    
    .form-section {
        margin-bottom: 30px;
    }
    
    .profile-picture-section {
        display: flex;
        align-items: center;
        gap: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #262626;
    }
    
    .current-picture {
        flex-shrink: 0;
    }
    
    .profile-pic-preview {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #262626;
    }
    
    .picture-upload h3 {
        font-size: 20px;
        font-weight: 400;
        color: #f5f5f5;
        margin: 0 0 8px 0;
    }
    
    .change-photo-btn {
        color: #0095f6;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: color 0.2s;
    }
    
    .change-photo-btn:hover {
        color: #1877f2;
    }
    
    .hidden-file-input {
        display: none;
    }
    
    .form-section label {
        display: block;
        font-weight: 600;
        font-size: 16px;
        color: #f5f5f5;
        margin-bottom: 8px;
    }
    
    .form-section input,
    .form-section textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #262626;
        border-radius: 6px;
        background-color: #000;
        color: #f5f5f5;
        font-size: 16px;
        transition: border-color 0.2s;
    }
    
    .form-section input:focus,
    .form-section textarea:focus {
        outline: none;
        border-color: #0095f6;
    }
    
    .form-section textarea {
        resize: vertical;
        min-height: 80px;
        font-family: inherit;
    }
    
    .help-text {
        display: block;
        font-size: 12px;
        color: #8e8e8e;
        margin-top: 8px;
        line-height: 1.4;
    }
    
    .form-actions {
        display: flex;
        gap: 16px;
        padding-top: 20px;
        border-top: 1px solid #262626;
    }
    
    .submit-btn {
        background-color: #0095f6;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 8px 24px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    
    .submit-btn:hover {
        background-color: #1877f2;
    }
    
    .cancel-btn {
        background-color: transparent;
        color: #f5f5f5;
        border: 1px solid #262626;
        border-radius: 6px;
        padding: 8px 24px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: background-color 0.2s;
        display: flex;
        align-items: center;
    }
    
    .cancel-btn:hover {
        background-color: #262626;
    }
    
    @media (max-width: 768px) {
        .edit-profile-container {
            padding: 0 15px;
        }
        
        .profile-picture-section {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .submit-btn,
        .cancel-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection
