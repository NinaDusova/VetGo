@extends('layouts.header_not_logged')

@section('header')
    <link href="{{ asset('css/style.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="container">
        <div class="left-content">
            <h1>JOIN US</h1>
            <h2>We are the most popular veterinary community, you can check on exterminations of your pets and have everything under your thumb.</h2>
            <h2>We offer free chat with our doctors that you can use as consultation.</h2>
            <h2>See your upcoming appointments with ur pets.</h2>
        </div>
        <div class="right-content">
            <img src="{{ asset('images/about_img.png') }}" alt="Vetgo logo">
        </div>
    </div>
@endsection
