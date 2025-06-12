<!DOCTYPE html>
<html lang="EN">
    <head> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('partials.profilehead')
    </head>
    <body>
        @include('partials.sidebar')
        @include('partials.bottom-bar')
        @include('partials.profile-styles')
          <div class="M-container">
            @yield('profile-content')
          </div>
          
          <!-- Post Modal -->
          <div id="post-modal" class="post-modal">
            <div class="post-modal-content">
                <span id="modal-close" class="modal-close">&times;</span>
                <div class="modal-post-container">
                    <div class="modal-post-image">
                        <img id="modal-image" src="" alt="">
                    </div>
                    <div class="modal-post-details">
                        <div class="modal-post-header">
                            <div class="modal-user-info">
                                <img src="{{ asset('images/DefaultProfPic.png') }}" alt="Profile" class="profile-pic">
                                <a id="modal-user-link" href="#" class="username"><span id="modal-username"></span></a>
                            </div>
                        </div>
                        <div class="modal-post-caption">
                            <p><span class="username" id="modal-username-caption"></span> <span id="modal-caption"></span></p>
                        </div>
                        <div class="modal-post-stats">
                            <div class="likes"><span id="modal-likes"></span> likes</div>
                            <div class="time"><span id="modal-time"></span></div>
                        </div>
                        <div class="modal-post-actions">
                            <a id="view-full-post" href="#" class="view-full-post">View full post with comments</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      
          <script>
              feather.replace()
          </script>
          <!-- Include FontAwesome for icons -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
          <!-- Include follow styles -->
          <link rel="stylesheet" href="{{ asset('styles/follow.css') }}">
          <!-- Include post modal styles -->
          <link rel="stylesheet" href="{{ asset('styles/post-modal.css') }}">
          <!-- Include post options styles -->
          <link rel="stylesheet" href="{{ asset('styles/post-options.css') }}">
          <!-- Include follow.js for profile interactions -->
          <script src="{{ asset('js/follow.js') }}"></script>
          <!-- Include post-modal.js for post modal interactions -->
          <script src="{{ asset('js/post-modal.js') }}"></script>
          <!-- Include post-options.js for post options functionality -->
          <script src="{{ asset('js/post-options.js') }}"></script>
      </body>
      </html>