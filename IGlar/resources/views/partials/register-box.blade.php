 <div class="login-container">      
        <!-- LOGO SECTION -->
        <div class="logo">
            <img src="{{asset('/images/insta-logo.png')}}" alt="Instagram" style="width: 100px;">
        </div>
        
        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        </form>

        
        <!-- OR DIVIDER -->
        <div class="divider">OR</div>
        
        <!-- SOCIAL LOGIN -->
        <div class="social-login">
            <a href="#" class="facebook-login">Log in with Facebook</a>
        </div>
        
    </div>

    <div class="login-container">
        <p>Already have an account? <a href="{{route('login')}}">Log in</a></p>
    </div>