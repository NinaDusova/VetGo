@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="menu">
        <div class="image-rectangle">
            <form action="{{ route('uploadphoto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="photo" style="display: block; width: 100%; height: 100%; cursor: pointer;">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo" class="user-photo">
                    @else
                        <i class="bi bi-person"></i>
                    @endif
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" style="display: none;" onchange="this.form.submit();">
            </form>
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

                @if(isset($doctor))
                <h2>Licence</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="license_number" value="{{ $doctor->license_number }}" placeholder="Enter license number">
                    </label>
                </div>

                <h2>Ordination</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="ordination" value="{{ $doctor->ordination }}" placeholder="Enter ordination">
                    </label>
                </div>
                @endif

                <div class="button">
                    <button class="btn">Submit</button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('deleteuser') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
            @csrf
            @method('DELETE')
            <div class="button">
                <button class="btn delbtn">Delete account</button>
            </div>
        </form>
    </div>
@endsection
