@extends('layout.layout')

@section('content')
<div class="search-container">
    <div class="search-header">
        <h3>Search</h3>
    </div>
    
    <form action="{{ route('search') }}" method="GET" class="search-form">
        <div class="search-input-container">
            <div class="search-icon">
                <svg aria-label="Search" color="rgb(142, 142, 142)" fill="rgb(142, 142, 142)" height="16" role="img" viewBox="0 0 24 24" width="16">
                    <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22" y1="16.511" y2="22"></line>
                </svg>
            </div>
            <input type="text" name="query" placeholder="Search" value="{{ $query ?? '' }}" autofocus>
            @if(isset($query) && !empty($query))
                <div class="clear-search">
                    <button type="button" onclick="clearSearch()">✕</button>
                </div>
            @endif
        </div>
    </form>
    
    <div class="search-results">
        @if(isset($users) && count($users) > 0)
            <div class="search-results-header">
                <h4>Users</h4>
            </div>
            <div class="user-results">
                @foreach($users as $user)
                    <div class="user-item">
                        <a href="{{ route('profile.show', $user) }}" class="user-link">
                            <div class="user-avatar">
                                <img src="{{ asset('images/DefaultProfPic.png') }}" alt="{{ $user->name }}">
                            </div>
                            <div class="user-info">
                                <div class="username">{{ $user->name }}</div>
                                <div class="user-email">{{ $user->email }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @elseif(isset($query) && !empty($query))
            <div class="no-results">
                <p>No users found for "{{ $query }}"</p>
            </div>
        @endif
    </div>
</div>

<script>
    function clearSearch() {
        document.querySelector('input[name="query"]').value = '';
        document.querySelector('form').submit();
    }
</script>

<style>
    .search-container {
        max-width: 470px;
        margin: 0 auto;
        padding: 0 10px;
    }
    
    .search-header {
        padding: 16px 0;
        border-bottom: 1px solid #262626;
    }
    
    .search-header h3 {
        font-size: 16px;
        font-weight: 600;
        color: #f5f5f5;
        text-align: center;
        margin: 0;
    }
    
    .search-form {
        padding: 8px 16px;
        margin: 10px 0;
    }
    
    .search-input-container {
        background-color: #262626;
        border-radius: 8px;
        display: flex;
        align-items: center;
        padding: 8px 12px;
        position: relative;
    }
    
    .search-icon {
        margin-right: 8px;
    }
    
    .search-input-container input {
        background-color: transparent;
        border: none;
        color: #f5f5f5;
        flex: 1;
        font-size: 16px;
        outline: none;
    }
    
    .search-input-container input::placeholder {
        color: #8e8e8e;
    }
    
    .clear-search button {
        background: none;
        border: none;
        color: #8e8e8e;
        cursor: pointer;
        font-size: 14px;
    }
    
    .search-results {
        padding: 8px 0;
    }
    
    .search-results-header {
        padding: 8px 16px;
    }
    
    .search-results-header h4 {
        font-size: 16px;
        font-weight: 600;
        color: #f5f5f5;
        margin: 0;
    }
    
    .user-results {
        margin-top: 8px;
    }
    
    .user-item {
        padding: 8px 16px;
    }
    
    .user-link {
        display: flex;
        align-items: center;
        text-decoration: none;
    }
    
    .user-avatar {
        width: 44px;
        height: 44px;
        margin-right: 12px;
    }
    
    .user-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .user-info {
        flex: 1;
    }
    
    .username {
        color: #f5f5f5;
        font-weight: 600;
        font-size: 14px;
    }
    
    .user-email {
        color: #8e8e8e;
        font-size: 14px;
        margin-top: 2px;
    }
    
    .no-results {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
    }
    
    .no-results p {
        color: #8e8e8e;
        font-size: 14px;
    }
</style>
@endsection
