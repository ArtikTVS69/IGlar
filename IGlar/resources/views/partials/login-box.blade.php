 <div class="login-container">      
        <!-- LOGO SECTION -->
        <div class="logo">
            <img src="{{asset('/images/insta-logo.png')}}" alt="Instagram" style="width: 100px;">
        </div>
        
        <!-- LOGIN FORM -->
        <form class="login-form" method="POST" action="{{route('login')}}">
            @csrf
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        
        <!-- OR DIVIDER -->
        <div class="divider">OR</div>
        
        <!-- SOCIAL LOGIN -->
        <div class="social-login">
            <a href="#" class="facebook-login">Log in with Facebook</a>
        </div>
        
        <!-- FORGOT PASSWORD -->
        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>
    </div>

    <div class="signup-container">
        <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
    </div>