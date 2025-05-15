@extends('layout.profile-layout')

@section('profile-content')
@if(isset($user))
    @include('partials.upper-part')
    <br>
    <br>
    <br>
    <br>
    @include('partials.bottom-part')
    @if($posts->count() > 0)
        @include('partials.bottom-part-share-photos')
    @else
        <div class="no-posts-message">
            <h3>No Posts Yet</h3>
            @if(Auth::check() && Auth::id() === $user->id)
                <p>Share your first photo</p>
                <a href="{{ route('add.post') }}" class="add-post-btn">Add Post</a>
            @endif
        </div>
    @endif
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @include('partials.bottom-part-grey')
@else
    <div class="error-message">
        <h2>User not found</h2>
        <a href="{{ route('posts.feed') }}">Return to feed</a>
    </div>
@endif
@endsection