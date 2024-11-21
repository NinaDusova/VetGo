<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VETGO</title>

    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet"> <!-- font-style -->
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
</head>
<body>
<div class="logo-container">
    <img src="{{ asset('images/logo.png') }}" onclick="window.location.href='{{ route('home') }}'" alt="logo-image" class="responsive-logo">
    <h1>VETGO</h1>
</div>


<div class="centered-rectangle big-box">
    <!-- Obsah obdĺžnika môže byť tu -->
    <h2>Please enter your details</h2>
    <h1>Welcome back</h1>

    <div class="centered-rectangle small-box">
        <h2>Email address</h2>
    </div>

    <div class="centered-rectangle small-box">
        <h2>Password</h2>
    </div>

    <h2 class="forgot-password"> Forgot password</h2>

    <div class="centered-rectangle small-box blue">
        <h2>Sign In</h2>
    </div>

    <div class="account-help">
        <h2> Don't have an account ?</h2>
        <h2 class="sign-up">Sign up</h2>
    </div>
</div>
</body>

</html>
