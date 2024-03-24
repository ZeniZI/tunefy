<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <title>Login</title>

        <link rel="stylesheet" href="/css/register.css" />
    </head>

    <body>
        <div class="login-page">
            <div class="login-form">
                @if ($errors->any())

                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $item)

                        <li>{{ $item }}</li>

                        @endforeach
                    </ul>
                </div>

                @endif

                <div class="login-form-left">
                    <div class="login-form-left-content">
                        <div class="switch-button">
                            <div class="sign-in">
                                <a href="/login" class="btn">Sign In </a>
                            </div>

                            <div class="sign-up">
                                <a href=""><p>Sign Up</p></a>
                            </div>
                        </div>

                        <div class="logo">
                            <img src="../asset/graphics/logo.svg" />
                        </div>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="login-form-field">
                                <label for="name" class="form-label"
                                    >Name</label
                                >

                                <input
                                    type="text"
                                    value="{{ old('email')}}"
                                    name="name"
                                    class="form-control"
                                />
                            </div>

                            <div class="login-form-field">
                                <label for="email" class="form-label"
                                    >Email</label
                                >

                                <input
                                    type="email"
                                    value=""
                                    name="email"
                                    class="form-control"
                                />
                            </div>

                            <div class="login-form-field">
                                <label for="password" class="form-label"
                                    >Password</label
                                >

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    id="password" type="password" name="password"  placeholder="Pssword" required autocomplete="new-password" 
                                />
                                <input id="password_confirmation"  type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                            </div>

                            

                            <div class="auth-btn">
                    
                                <button name="submit" type="submit" class="btn">
                                    SIGN UP
                                </button>
                            </div>

                            <div></div>
                        </form>
                    </div>
                </div>

                <div class="login-form-right"></div>
            </div>
        </div>
    </body>
</html>
