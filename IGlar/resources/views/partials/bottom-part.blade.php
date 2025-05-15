<div class="bottom-part">
    <div class="bottom-part-txt">
      <p class="prisp active">POSTS</p>
      @if(Auth::check() && Auth::id() === $user->id)
        <p class="uloz">SAVED</p>
      @endif
      <p class="sozn">TAGGED</p>
    </div>
  </div>