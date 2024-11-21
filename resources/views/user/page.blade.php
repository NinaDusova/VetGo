@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_page.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="container-page">

        <div class="left-content-page d-none d-md-block">
            <img src="{{ asset('images/page_img.png') }}" alt="Vetgo logo">
        </div>

        <div class="right-content-page">
            <h3>Welcome back, <span id="user-name" class="highlight-name">[THE NAME OF THE USER]</span></h3>

            <h2 class="healthcare-title">Healthcare of pets:</h2>

            <div class="button-container-page" onclick="window.location.href='{{ route('userprofile') }}'">
                <button class="btn">MY PROFILE</button>
            </div>

            <div class="button-container-page" onclick="window.location.href='{{ route('pets') }}'">
                <button class="btn">MY PETS</button>
            </div>

            <div class="button-container-page" onclick="window.location.href='{{ route('investigations') }}'">
                <button class="btn">INVESTIGATIONS</button>
            </div>
        </div>
    </div>
@endsection
