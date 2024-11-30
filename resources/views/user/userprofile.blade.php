@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('css/update.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div>
        @if(session()->has('success'))
            <div class="success-message">
                <h2>{{session('success')}}</h2>
            </div>
        @endif
    </div>


    <div class="menu">
        <div class="image-rectangle">
            <i class="bi bi-person"></i>
        </div>

        <div class="informations-profile">
            <h2>Name and surname: {{ $user->name }}</h2>

            <h2>Phone number: {{ $user->phone_number ?? 'Not provided' }}</h2>

            <h2>Email address: {{ $user->email ?? 'Not provided'}}</h2>
        </div>

        <div class="button-edit">
            <i class="bi bi-pencil-square" onclick="window.location.href='{{ route('edituser') }}'"></i>
        </div>

    </div>
@endsection
