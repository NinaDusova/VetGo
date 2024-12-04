<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VETGO</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">

    <!-- Link to CSS (from public directory if not using Vite) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>
<!--------navbar--------------------------------->
<nav class="navbar navbar-expand-lg" aria-label="Tenth navbar example">
    <div class="logo-image">
        <img src="{{ asset('images/logo.png') }}" onclick="window.location.href='{{ route('page') }}'" alt="logo-image" class="responsive-logo">
    </div>
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">

                <!-- dropdown------------------------->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">PROFILE</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->routeIs('userprofile') ? 'active' : '' }}" href="{{ route('userprofile') }}">My profile</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('pets') ? 'active' : '' }}" href="{{ route('pets') }}">My pets</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('investigations') ? 'active' : '' }}" href="{{ route('investigations') }}">Investigations</a></li>
                    </ul>
                </li>
                <!--------dropdown------------------------>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('page') ? 'active' : '' }}" aria-current="page" href="{{ route('page') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SERVICE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('puzzle') }}">GAME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout" href="{{ route('home') }}">Log Out</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!--------navbar--------------------------------->
<main>
    @yield('content')
</main>

</body>
</html>
