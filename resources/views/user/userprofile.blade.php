@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('css/update.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div>
        @if(session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h2>{{session('success')}}</h2>
            </div>
        @endif
    </div>
{{--    <div>--}}
{{--        @if(session()->has('success'))--}}
{{--            <div class="success-message">--}}
{{--                <h2>{{session('success')}}</h2>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}

{{--    <div class="alert alert-warning" role="alert">--}}
{{--        This is a warning alert—check it out!--}}
{{--    </div>--}}


    <div class="menu">
        <div class="image-rectangle">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo" class="user-photo">
            @else
                <i class="bi bi-person"></i>
            @endif
        </div>

        <div class="informations-profile">
            <h2>Name and surname: {{ $user->name }}</h2>

            <h2>Phone number: {{ $user->phone_number ?? 'Not provided' }}</h2>

            <h2>Email address: {{ $user->email ?? 'Not provided'}}</h2>

            @if(isset($doctor))
                <h2>Licence: {{ $doctor->license_number ?? 'Not provided' }}</h2>
                <h2>Ordination: {{ $doctor->ordination ?? 'Not provided'}}</h2>
            @endif
        </div>

        <div class="button-edit">
            <i class="bi bi-pencil-square" onclick="window.location.href='{{ isset($doctor) ? route('doctoredit') : route('edituser') }}'"></i>
        </div>

    </div>
@endsection
