 <div class="login-container">      
        <!-- LOGO SECTION -->
        <div class="logo">
            <img src="{{asset('/images/insta-logo.png')}}" alt="Instagram" style="width: 100px;">
        </div>
        
        <!-- LOGIN FORM -->
        <form class="register-form" method="POST" action="{{route('register')}}">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="email" placeholder="Email adress" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
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