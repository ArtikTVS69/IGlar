<!DOCTYPE html>
<html lang="EN">
    <head> 
        @include('partials.profilehead')
    </head>
    <body>
        @include('partials.sidebar')
        @include('partials.bottom-bar')
          <div class="M-container">
            @yield('profile-content')
          </div>
      
          <script>
              feather.replace()
          </script>
      </body>
      </html>