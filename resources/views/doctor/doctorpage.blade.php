@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_page.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="container-page">
        <div class="right-content-page">
            @if($userName)
            <h3>Welcome, <span id="user-name" class="highlight-name">{{ $userName }}</span></h3>
            @else
                <h1>No doctor record found or not logged in.</h1>
            @endif

            <h2 class="healthcare-title">Healthcare of pets:</h2>

            <div class="button-container-page" onclick="window.location.href='{{ route('doctorprofile') }}'">
                <button class="btn">MY PROFILE</button>
            </div>

            <div class="button-container-page" onclick="window.location.href='{{ route('petclients') }}'">
                <button class="btn">PET CLIENTS</button>
            </div>

            <div class="button-container-page" onclick="window.location.href='{{ route('investigations') }}'">
                <button class="btn">INVESTIGATIONS</button>
            </div>
        </div>
    </div>
@endsection
