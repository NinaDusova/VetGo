@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="menu">
        <div class="image-rectangle">
            <i class="bi bi-person"></i>
        </div>

        <form action="{{ route('updateuser') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="informations">
                <h2>Name and surname</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="name" value="{{ $user->name }}" placeholder="Enter name and surname">
                    </label>
                </div>

                <h2>Phone number</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="phone_number" value="{{ $user->phone_number ?? '' }}" placeholder="Enter phone number">
                    </label>
                </div>

                <h2>Email address</h2>
                <div class="box">
                    <label>
                        <input type="email" class="h3-like" name="email" value="{{ $user->email }}" placeholder="Enter email">
                    </label>
                </div>

                <div class="button">
                    <button class="btn">Submit</button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('deleteuser') }}">
            @csrf
            @method('DELETE')
            <div class="button">
                <button class="btn delbtn">Delete account</button>
            </div>
        </form>
    </div>
@endsection
