<div class="sidebar">
    <div class="upper-container">
      <a href="{{route('posts.index')}}"><img src="{{asset('images/insta-written.png')}}" class="logo"></a>
      <a href="{{route('posts.index')}}"><img src="{{asset('images/insta-logo.png')}}" class="logo2"></a>
        <div class="link">
            <img src="{{asset('images/home.png')}}" style="height: 1rem; margin-right: 0.5rem;">
            <a href="{{route('posts.feed')}}">Feed</a>
        </div>
        <div class="link">
            <i class="fas fa-search"></i>
            <a href="{{ route('search.index') }}">Search</a>
          </div>
          <div class="link">
            <img src="{{asset('images/explore.png')}}" style="height: 18px; margin-right: 0.5rem"/>
            <a href="{{route('posts.index')}}">All Posts</a>
          </div>
          <div class="link">
            <img src="{{asset('images/reels.png')}}" style="height: 18px; margin-right: 0.5rem"/>
            <a href="#">Filmové pásy</a>
          </div>
          <div class="link">
            <img src="{{asset('images/Spravy.png')}}" style="height: 18px; margin-right: 0.5rem"/>
            <a href="#">Správy</a>
          </div>
          <div class="link">
            <img src="{{asset('images/ntf.png')}}" style="height: 20px; margin-right: 0.3rem;"/>
            <a href="#">Upozornenia</a>
          </div>
          <div class="link">
            <img src="{{asset('images/create.png')}}" style="height: 18px; margin-right: 0.5rem"/>
            <a href="{{route('add.post')}}">Vytvoriť</a>
          </div> 
          @auth
            <div class="link">
              @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" style="height: 1.2rem; width: 1.2rem; border-radius: 50%; margin-right: 0.5rem; margin-left: -0.23rem; object-fit: cover;"/>
              @else
                <img src="{{asset('images/DefaultProfPic.png')}}" style="height: 1.2rem; margin-right: 0.5rem; margin-left: -0.23rem;"/>
              @endif
              <a href="{{ route('profile.show', Auth::user()) }}">{{Auth::user()->name}}</a>
            </div>      
          @endauth
    </div>    

    <div class="bottom-container">
        <div class="link">
          <img src="{{asset('images/logoutIcon.png')}}" style="height: 1.2rem; margin-right: 0.5rem;"/>
          <a href="/logout" style="color:crimson">Log out</a>
          </div>  
    </div>
  </div>