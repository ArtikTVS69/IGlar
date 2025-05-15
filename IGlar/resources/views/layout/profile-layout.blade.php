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
      
          <script>
              feather.replace()
          </script>
          <!-- Include FontAwesome for icons -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
          <!-- Include follow.js for profile interactions -->
          <script src="{{ asset('js/follow.js') }}"></script>
      </body>
      </html>