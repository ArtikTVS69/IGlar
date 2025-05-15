@extends('layout.layout')

@section('content')
<div class="create-post-container">
    <h1>Create New Post</h1>
    
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
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
            <small class="form-text text-muted">Select an image file (JPEG, PNG, GIF, JPG).</small>
        </div>
        
        <div class="form-group">
            <label for="caption">Caption</label>
            <textarea name="caption" id="caption" class="form-control" rows="3" required>{{ old('caption') }}</textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<style>
    .create-post-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
    }
    
    h1 {
        margin-bottom: 20px;
        color: #262626;
    }
    
    .alert {
        padding: 10px;
        margin-bottom: 15px;
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
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }
    
    .form-control-file {
        display: block;
        width: 100%;
    }
    
    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
    }
    
    .form-text {
        display: block;
        margin-top: 5px;
        font-size: 12px;
    }
    
    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-primary {
        background-color: #0095f6;
        color: white;
    }
    
    .btn-secondary {
        background-color: #dbdbdb;
        color: #262626;
        margin-left: 10px;
    }
</style>
@endsection
