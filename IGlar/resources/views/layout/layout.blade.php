<!DOCTYPE html>
<html lang="EN">
    <head> 
        @include('partials.head')
    </head>
<body>
    @include('partials.sidebar')
    @include('partials.bottom-bar')
    <div class="main-container">
      @yield('content')
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/post-options.js') }}"></script>
</body>
</html>