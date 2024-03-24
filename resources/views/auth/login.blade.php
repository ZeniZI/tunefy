<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="/css/login.css" />
</head>
<body>
    <div class="login-page">
        <div class="login-form">

            <div class="login-form-left">
                <div class="login-form-left-content">
                    <div class="switch-button">
                        <div class="sign-in">
                            <a href="/login" class="btn">Sign In</a>
                        </div>

                        <div class="sign-up">
                            <a href="/register" class="btn">Sign Up</a>
                        </div>
                    </div>

                    <div class="logo">
                        <img src="../asset/graphics/logo.svg" />
                    </div>
           
                    <div class="wlcm">
                        <img src="../asset/graphics/wlcmttnfy.svg" />
                    </div>

            <p>Login to your account to see and choose your favorite musical instrument from Tunefy</p>

            @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $item)
                    
                    <li>{{ $item }}</li>
                        
                    @endforeach
                </ul>
            </div> 
            @endif

            <form action="" method="POST">

                @csrf

                <div class="login-form-field">
                    <label for="email" class="form-label">Email</label>

                    <input type="email" value="{{ old('email')}}" name="email" class="form-control">
                </div>

                <div class="login-form-field">
                    <label for="password" class="form-label">Password</label>

                    <input type="password" name="password" class="form-control">
                </div>
                        <div class="impossible-features-lol">
                        <div class="remember-me">
                                    <input
                                        type="checkbox"
                                        id="remember"
                                        name="rememberMe"
                                    />
                                    <label for="remember">Remember Me</label>
                                </div>

                                <div class="forgot-password">
                                @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">Forgot your Password?</a>
                                @endif
                                </div>
                            </div>
                            
                <div class="auth-btn">
                    <button name="submit" type="submit" class="btn">
                        SIGN IN
                    </button>
                </div>
            </form>
        </div>
        </div>

        <div class="login-form-right"></div>
    </div>
</body>
</html>
