@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="menu">
        <div class="image-rectangle">
            <i class="bi bi-person"></i>
        </div>

        <div class="informations">
            <h2>Name and surname</h2>
            <div class="box">
                <h3>Enter name and surname</h3>
            </div>

            <h2>Phone number</h2>
            <div class="box">
                <h3>Enter phone number</h3>
            </div>

            <h2>Email address</h2>
            <div class="box">
                <h3>Enter email address</h3>
            </div>

            <div class="button">
                <button class="btn">Submit</button>
            </div>
        </div>
    </div>
@endsection
