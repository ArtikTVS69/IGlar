<div class="sidebar">
    <div class="upper-container">
      <a href="{{route('welcome')}}"><img src="{{asset('images/insta-written.png')}}" class="logo"></a>
      <a href="{{route('welcome')}}"><img src="{{asset('images/insta-logo.png')}}" class="logo2"></a>
        <div class="link">
            <img src="{{asset('images/home.png')}}" style="height: 1rem; margin-right: 0.5rem;">
            <a href="{{route('welcome')}}">Domov</a>
        </div>
        <div class="link">
            <i class="fas fa-search"></i>
            <a href="#">Hľadať</a>
          </div>
          <div class="link">
            <img src="{{asset('images/explore.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
            <a href="#">Preskúmať</a>
          </div>
          <div class="link">
            <img src="{{asset('images/reels.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
            <a href="#">Filmové pásy</a>
          </div>
          <div class="link">
            <img src="{{asset('images/Spravy.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
            <a href="#">Správy</a>
          </div>
          <div class="link">
            <i data-feather="heart" style="width: 1rem ; margin-right: 0.5rem"></i>
            <a href="#">Upozornenia</a>
          </div>
          <div class="link">
            <img src="{{asset('images/create.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
            <a href="#">Vytvoriť</a>
          </div> 
          <div class="link">
            <img src="{{asset('images/Profilovka.png')}}" style="height: 1.2rem; margin-right: 0.5rem; margin-left: -0.23rem;"/>
            <a href="{{ route('profile') }}">Profil</a>
          </div>
    </div>    

    <div class="bottom-container">
        <div class="link">
            <i class="fas fa-ellipsis-h"></i>
            <a href="#">Viac</a>
          </div>  
    </div>
  </div>