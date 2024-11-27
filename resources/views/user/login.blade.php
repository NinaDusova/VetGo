<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VETGO</title>

    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet"> <!-- font-style -->
    <link href="{{ asset('css/style_login.css') }}?v={{ time() }}" rel="stylesheet">
</head>
<body>
<div class="logo-container">
    <img src="{{ asset('images/logo.png') }}" onclick="window.location.href='{{ route('home') }}'" alt="logo-image" class="responsive-logo">
    <h1>VETGO</h1>
</div>


<div class="centered-rectangle big-box">
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <h2>Please enter your details</h2>
        <h1>Welcome back</h1>

        <h3>Email address:</h3>
        <div class="centered-rectangle small-box">
            <label>
                <input type="email" class="h2-like" placeholder="Enter email" name="email">
            </label>
        </div>

        <h3>Password:</h3>
        <div class="centered-rectangle small-box">
            <label>
                <input type="password" class="h2-like" placeholder="Enter password" name="password">
            </label>
        </div>


        <h2 class="forgot-password"> Forgot password</h2>

        <button type="submit" class="centered-rectangle small-box blue h2-like">
            Sign In
        </button>
    </form>

    <div class="account-help">
        <h2> Don't have an account ?</h2>
        <h2 class="sign-up" onclick="window.location.href='{{ route('signup') }}'">Sign up</h2>
    </div>
</div>
</body>

</html>
