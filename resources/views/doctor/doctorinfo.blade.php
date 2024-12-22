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

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="centered-rectangle big-box">
    <form action="{{ route('doctorinfo.post') }}" method="POST">
        @csrf
        <h1>Create your account</h1>

        <h3>License number:</h3>
        <div class="centered-rectangle small-box">
            <label>
                <input type="text" class="h2-like" placeholder="Enter license number" name="license_number">
            </label>
        </div>

        <h3>Ordination:</h3>
        <div class="centered-rectangle small-box">
            <label>
                <input type="text" class="h2-like" placeholder="Enter ordination" name="ordination">
            </label>
        </div>

        <button type="submit" class="centered-rectangle small-box blue h2-like">
            Submit
        </button>
    </form>
</div>
</body>

</html>
