<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <link
        data-default-icon="https://static.cdninstagram.com/rsrc.php/v3/yt/r/30PrGfR3xhB.png"
        rel="icon"
        sizes="192x192"
        href="https://static.cdninstagram.com/rsrc.php/v3/yt/r/30PrGfR3xhB.png"
    />
    <script src="https://unpkg.com/feather-icons"></script>
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <script
    src="https://kit.fontawesome.com/5b938571dd.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
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
    <div class="bottom-bar">
      <img src="{{asset('images/home.png')}}" style="height: 1rem; margin-right: 0.5rem;">
      <i class="fas fa-search"></i>
      <img src="{{asset('images/explore.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
      <img src="{{asset('images/reels.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
      <img src="{{asset('images/create.png')}}" style="height: 1rem; margin-right: 0.5rem"/>
      <a href="profile.html"><img src="{{asset('images/Profilovka.png')}}" style="height: 1.5rem; margin-right: 0.5rem"/></a>
    </div>
    <div class="main-container">
      <div class="stories-post">
        <div class="stories">
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/PeterHanik.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>petros...</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/ADO.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>karosene_</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/SimonKys.png')}}"
                alt="Profilovka"
              />
            </div>
            <p>incred...</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/JakubKakanec.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>hoopjakub</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/Marcus.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>mrmarcush</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/Keptn.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>pkepy</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/Maxo.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>mejxoo</p>
          </div>
          <div class="story">
            <div class="border">
              <img
                src="{{asset('images/Pejto.jpg')}}"
                alt="Profilovka"
              />
            </div>
            <p>pato_n...</p>
          </div>
      </div>
      <div class="posts-comp">
        <div class="post">
          <div class="post-head">
            <div class="post-info">
              <div class="border1">
                <img src="{{asset('images/Profilovka.png')}}" alt="Profilovka" class="profile-pic">
              </div>
              <p class="click">maxo_cv</p>
              <ul>
                <li class="list">420s</li>
              </ul>
            </div>
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <img src="{{asset('images/SIGMAMACO.png')}}" alt="Prispevok" class="post-img">
          <div class="post-icons">
            <div class="post-icons-left">
              <i data-feather="heart" class="post-icon"></i>
              <i data-feather="message-circle" class="post-icon"></i>
              <i data-feather="send" class="post-icon"></i>
            </div>
            <i data-feather="bookmark" class="post-icon"></i>
          </div>
         <p class="likes">6969 Páči sa mi to</p>
         <p class="caption"><span style="cursor: pointer;"><strong>maxo_cv</strong></span> Rizz or nah?</p>
         <p class="hashtag">#likeminors #kys #i #want #to #die #nohomo</p>
         <p class="show">Zobraziť preklad</p>
         <a href="#" class="comments">Zobraziť všetky komentáre (4871518484)</a>
         <p class="comments2">Pridať komentár...</p> 
        </div>
      </div>
      <div class="posts-comp">
        <div class="post">
          <div class="post-head">
            <div class="post-info">
              <div class="border1">
                <img src="{{asset('images/PeterHanik.jpg')}}" alt="Profilovka" class="profile-pic">
              </div>
              <p class="click">petros.hanik</p>
              <ul>
                <li class="list">69d</li>
              </ul>
            </div>
            <i class="fas fa-ellipsis-h" class="dots"></i>
          </div>
          <img src="{{asset('images/PetoHanikPost.png')}}" alt="Prispevok" class="post-img">
          <div class="post-icons">
            <div class="post-icons-left">
              <i data-feather="heart" class="post-icon"></i>
              <i data-feather="message-circle" class="post-icon"></i>
              <i data-feather="send" class="post-icon"></i>
            </div>
            <i data-feather="bookmark" class="post-icon"></i>
          </div>
         <p class="likes">420 Páči sa mi to</p>
         <p class="caption"> <span style="cursor: pointer;"><strong>petros.hanik</strong></span> no mam už piči</p>
         <p class="hashtag">#notzhuleny #fr #chcemumriet</p>
         <p class="show">Zobraziť preklad</p>
         <a href="#" class="comments">Zobraziť všetky komentáre (666)</a>
         <p class="comments2">Pridať komentár...</p> 
        </div>
      </div>
      <div class="posts-comp">
        <div class="post">
          <div class="post-head">
            <div class="post-info">
              <div class="border1">
                <img src="{{asset('images/SimonKys.png')}}" alt="Profilovka" class="profile-pic">
              </div>
              <p class="click">incredibilis_infirmus</p>
              <ul>
                <li class="list">1 177 týž.</li>
              </ul>
            </div>
            <i class="fas fa-ellipsis-h" class="dots"></i>
          </div>
          <img src="{{asset('images/SimonKysPost.png')}}" alt="Prispevok" class="post-img">
          <div class="post-icons">
            <div class="post-icons-left">
              <i data-feather="heart" class="post-icon"></i>
              <i data-feather="message-circle" class="post-icon"></i>
              <i data-feather="send" class="post-icon"></i>
            </div>
            <i data-feather="bookmark" class="post-icon"></i>
          </div>
         <p class="likes">420 Páči sa mi to</p>
         <p class="caption"> <span style="cursor: pointer;"><strong>incredibilis_infirmus</strong></span> no mam už piči</p>
         <p class="hashtag">#notzhuleny #fr #chcemumriet</p>
         <p class="show">Zobraziť preklad</p>
         <a href="#" class="comments">Zobraziť všetky komentáre (666)</a>
         <p class="comments2">Pridať komentár...</p> 
        </div>
      </div>
    </div>
</body>
</html>
