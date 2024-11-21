@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="menu">
        <div class="image-rectangle">
            <i class="bi bi-person"></i>
        </div>

        <div class="informations-profile">
            <h2>Name and surname: [TEXT]</h2>

            <h2>Phone number: [PHONE NUMBER]</h2>

            <h2>Email address: [EMAIL]</h2>
        </div>

        <div class="button-edit">
            <i class="bi bi-pencil-square" onclick="window.location.href='{{ route('edituser') }}'"></i>
        </div>

    </div>
@endsection
