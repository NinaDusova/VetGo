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
    <h1>Create your account</h1>

    <h3>Name:</h3>
    <div class="centered-rectangle small-box">
        <h2>Enter name and surname</h2>
    </div>

    <h3>Email address:</h3>
    <div class="centered-rectangle small-box">
        <h2>Enter email</h2>
    </div>

    <h3>Password:</h3>
    <div class="centered-rectangle small-box">
        <h2>Enter password</h2>
    </div>

    <h3>Repeat password:</h3>
    <div class="centered-rectangle small-box">
        <h2>Enter password again</h2>
    </div>

    <div class="centered-rectangle small-box blue">
        <h2>Create account</h2>
    </div>
</div>
</body>

</html>
