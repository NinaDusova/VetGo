@extends('layouts.header_not_logged')

@section('header')
    <link href="{{ asset('css/style.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="container">
        <div class="left-content">
            <h1>VETGO</h1>
            <h2>At VetGo, we believe that every pet deserves exceptional care. </h2>
            <h2>We offer comprehensive veterinary check-ups, vaccinations, and personalized treatment plans designed to meet the unique needs of your pets.</h2>

            <div class="button-container">
                <button class="btn btn-to-about-page" onclick="window.location.href='{{ route('about') }}'">LEARN MORE</button>
            </div>
        </div>
        <div class="right-content">
            <img src="{{ asset('images/main_img.png') }}" alt="Vetgo logo">
        </div>
    </div>
@endsection

