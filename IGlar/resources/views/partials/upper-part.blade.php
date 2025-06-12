<div class="upper-part-full">
    <div class="upper-part1">
      <div class="profilpfp">
        <div class="border">
          <div class="profil">
            @if($user->profile_picture)
              <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}">
            @else
              <img src="{{asset('images/DefaultProfPic.png')}}" alt="{{ $user->name }}">
            @endif
          </div>
        </div>
      </div>
      <div class="info">
        <div class="info1">
          <h2>{{ $user->name }}</h2>
          @if(Auth::check() && Auth::id() === $user->id)
            <a class="upr" href="{{ route('profile.edit', $user) }}">Edit profile</a>
            <a class="upr" href="#">View archive</a>
          @else
            <div class="follow-button-container">
              @if(Auth::check() && Auth::user()->isFollowing($user))
                <button class="unfollow-btn" data-user-id="{{ $user->id }}">Unfollow</button>
              @else
                <button class="follow-btn" data-user-id="{{ $user->id }}">Follow</button>
              @endif
            </div>
          @endif
          <svg aria-label="Options" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24"><title>Options</title><circle cx="12" cy="12" fill="none" r="8.635" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle><path d="M14.232 3.656a1.269 1.269 0 0 1-.796-.66L12.93 2h-1.86l-.505.996a1.269 1.269 0 0 1-.796.66m-.001 16.688a1.269 1.269 0 0 1 .796.66l.505.996h1.862l.505-.996a1.269 1.269 0 0 1 .796-.66M3.656 9.768a1.269 1.269 0 0 1-.66.796L2 11.07v1.862l.996.505a1.269 1.269 0 0 1 .66.796m16.688-.001a1.269 1.269 0 0 1 .66-.796L22 12.93v-1.86l-.996-.505a1.269 1.269 0 0 1-.66-.796M7.678 4.522a1.269 1.269 0 0 1-1.03.096l-1.06-.348L4.27 5.587l.348 1.062a1.269 1.269 0 0 1-.096 1.03m11.8 11.799a1.269 1.269 0 0 1 1.03-.096l1.06.348 1.318-1.317-.348-1.062a1.269 1.269 0 0 1 .096-1.03m-14.956.001a1.269 1.269 0 0 1 .096 1.03l-.348 1.06 1.317 1.318 1.062-.348a1.269 1.269 0 0 1 1.03.096m11.799-11.8a1.269 1.269 0 0 1-.096-1.03l.348-1.06-1.317-1.318-1.062.348a1.269 1.269 0 0 1-1.03-.096" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" style="margin-top: 26px;"></path></svg>
        </div>
        <div class="info2">
          <p><strong>{{ $posts->count() }}</strong> posts</p>
          <p><strong>{{ $followersCount }}</strong> followers</p>
          <p><strong>{{ $followingCount }}</strong> following</p>
        </div>
        <div class="info3">
          <p>{{ $user->name }}</p>              
        </div>
        <div class="info4">
          @if($user->bio)
            <div>{{ $user->bio }}</div>
          @else
            <div>Welcome to my profile</div>
          @endif
        </div>
      </div>
    </div>
  </div>