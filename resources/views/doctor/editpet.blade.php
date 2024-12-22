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
            @if(isset($pet) && $pet->photo)
                <img src="{{ asset('storage/' . $pet->photo) }}" alt="Pet Photo" class="user-photo">
            @else
                <i class="bi bi-camera"></i>
            @endif
        </div>
        <div class="informations">
            <form action="{{ route('doctor.updatePet', $pet->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h2>Species</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="species" placeholder="Enter a type of species" value="{{ old('species', $pet->species) }}" required>
                    </label>
                </div>

                <h2>Gender</h2>
                <div class="box">
                    <label>
                        <select name="gender" class="h3-like" required>
                            <option value="male" {{ old('gender', $pet->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $pet->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </label><br><br>
                </div>

                <h2>Date of birth</h2>
                <div class="box">
                    <label for="birthdate">
                        <input type="date" name="birth_day" id="birthdate" class="no-border" value="{{ old('birth_day', $pet->birth_day) }}" required/>
                    </label>
                </div>

                <h2>Neutered</h2>
                <div class="box">
                    <input type="hidden" name="neutered" value="0">
                    <label>
                        <input type="checkbox" name="neutered" value="1" {{ old('neutered', $pet->neutered) ? 'checked' : '' }}><br><br>
                    </label>
                </div>

                <h2>Chip ID</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="chip" placeholder="Enter chip ID" value="{{ old('chip', $pet->chip) }}" required>
                    </label>
                </div>

                <h2>Breed</h2>
                <div class="box">
                    <label>
                        <input type="text" class="h3-like" name="breed" placeholder="Enter breed of pet" value="{{ old('breed', $pet->breed) }}" required>
                    </label>
                </div>

                <h2>Weight</h2>
                <div class="box">
                    <label>
                        <input type="number" class="h3-like" name="weight" placeholder="Enter pet weight" value="{{ old('weight', $pet->weight) }}" required>
                    </label>
                </div>

                <div class="button">
                    <button type="submit" class="btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
