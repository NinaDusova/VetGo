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
            <form action="{{ route('uploadphotopet', $pet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="photo" style="display: block; width: 100%; height: 100%; cursor: pointer;">
                    @if($pet->photo)
                        <img src="{{ asset('storage/' . $pet->photo) }}" alt="User Photo" class="pet-photo">
                    @else
                        <i class="bi bi-camera"></i>
                    @endif
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" style="display: none;" onchange="this.form.submit();">
            </form>
        </div>
        <div class="informations">
            <form action="{{ $pet ? route('petupdate', $pet->id) : route('savepet')}}" method="POST">
                @csrf

                @if($pet)
                    @method('PUT')
                @endif

                <h2>Species</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="species" placeholder="Enter a type of species" value="{{ old('species', $pet->species ?? '') }}" required>
                    </label>
                </div>

                <h2>Gender</h2>
                <div class="box">
                    <label>
                        <select  name="gender" class="h3-like" style="" required>
                            <option value="male" {{ old('gender', $pet->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $pet->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </label><br><br>
                </div>

                <h2>Date of brith</h2>
                <div class="box">
                    <label for="birthdate" >
                        <input type="date" name="birth_day" id="birthdate" class="no-border" value="{{ old('birth_day', $pet->birth_day ?? '') }}"  required/>
                    </label>
                </div>

                <h2>Neutered</h2>
                <div class="box">
                    <input type="hidden" name="neutered" value="0" >
                    <label>
                        <input type="checkbox" name="neutered" value="1" {{ old('neutered', $pet->neutered ?? 0) ? 'checked' : '' }}><br><br>
                    </label>
                </div>

                <h2>Chip/pet passport</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="chip" placeholder="Enter a chip of pet" value="{{ old('chip', $pet->chip ?? '') }}" required>
                    </label>
                </div>

                <h2>Breed</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="breed" placeholder="Enter breed of pet" value="{{ old('breed', $pet->breed ?? '') }}" required>
                    </label>
                </div>

                <h2>Weight</h2>
                <div class="box">
                    <label>
                        <input type="number" class="h3-like" name="weight" placeholder="Enter pet weight" value="{{ old('weight', $pet->weight ?? '') }}" required>
                    </label>
                </div>

                <div class="button">
                    <button type="submit" class="btn">{{ $pet ? 'Update' : 'Submit' }}</button>
                </div>
            </form>
        </div>
    </div>

    <form method="POST" action="{{ route('deletepet', $pet->id) }}" onsubmit="return confirm('Are you sure you want to delete this pet?');">
        @csrf
        @method('DELETE')
        <div class="button">
            <button class="btn delbtn">Delete account</button>
        </div>
    </form>
@endsection
