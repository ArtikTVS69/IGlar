<div class="upper-part-full">
    <div class="upper-part1">
      <div class="profilpfp">
        <div class="border">
          <div class="profil">
            <img src="{{asset('images/DefaultProfPic.png')}}" alt="Profilovka" >
          </div>
        </div>
      </div>
      <div class="info">
        <div class="info1">
          @auth
            <h2>{{Auth::user()->name}}</h2>    
          @endauth
          <a class="upr" href="#" style="margin-top:18px; display:flex; align-items:center ">Upraviť profil</a>
          <a class="upr" href="#" style="margin-top:18px; display:flex; align-items:center ">Zobraziť archív</a>
          <svg aria-label="Možnosti" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24"><title>Možnosti</title><circle cx="12" cy="12" fill="none" r="8.635" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle><path d="M14.232 3.656a1.269 1.269 0 0 1-.796-.66L12.93 2h-1.86l-.505.996a1.269 1.269 0 0 1-.796.66m-.001 16.688a1.269 1.269 0 0 1 .796.66l.505.996h1.862l.505-.996a1.269 1.269 0 0 1 .796-.66M3.656 9.768a1.269 1.269 0 0 1-.66.796L2 11.07v1.862l.996.505a1.269 1.269 0 0 1 .66.796m16.688-.001a1.269 1.269 0 0 1 .66-.796L22 12.93v-1.86l-.996-.505a1.269 1.269 0 0 1-.66-.796M7.678 4.522a1.269 1.269 0 0 1-1.03.096l-1.06-.348L4.27 5.587l.348 1.062a1.269 1.269 0 0 1-.096 1.03m11.8 11.799a1.269 1.269 0 0 1 1.03-.096l1.06.348 1.318-1.317-.348-1.062a1.269 1.269 0 0 1 .096-1.03m-14.956.001a1.269 1.269 0 0 1 .096 1.03l-.348 1.06 1.317 1.318 1.062-.348a1.269 1.269 0 0 1 1.03.096m11.799-11.8a1.269 1.269 0 0 1-.096-1.03l.348-1.06-1.317-1.318-1.062.348a1.269 1.269 0 0 1-1.03-.096" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" style="margin-top: 26px;"></path></svg>
        </div>
        <div class="info2">
          <p>Príspevky:<strong> 3</strong></p>
          <p><span class="k">Sledovatelia:</span><strong> 69420</strong></p>
          <p><span class="k">Sledované:</span><strong> 9</strong></p>
        </div>
        <div class="info3">
          @auth
            <p>{{Auth::user()->name}}</p>              
          @endauth
        </div>
        <div class="info4">
          <p>-_-</p>
        </div>
      </div>
    </div>
    <div class="upper-part2">
      <div class="stories">
          <div class="storky">
            <img src="{{asset('images/Adousku.jpg')}}" alt="Profilovka">
            <p>Daily</p>
          </div>
          <div class="storky">
            <img src="{{asset('images/kakanec.jpg')}}" alt="Profilovka">
            <p>Fun</p>
          </div>
          <div class="storky">
            <img src="{{asset('images/PatoMesi.jpg')}}" alt="Profilovka">
            <p>OMG</p>
          </div>
          <div class="storky">
            <img src="{{asset('images/Maco.jpg')}}" alt="Profilovka">
            <p>Homies</p>
          </div>
      </div>
    </div>
  </div>