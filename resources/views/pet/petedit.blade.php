@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="menu">
        <div class="image-rectangle">
            <i class="bi bi-camera"></i>
        </div>
        <div class="informations">
            <form action="{{route('savepet')}}" method="POST">
                @csrf

            <h2>Species</h2>
            <div class="box">
                <label>
                    <input type="text" class="h3-like" name="species" placeholder="Enter a type of species" required>
                </label>
            </div>

           <h2>Gender</h2>
            <div class="box">
{{--                <label>--}}
{{--                    <input type="text" class="h3-like" name="gender" placeholder="Enter a type of species" required>--}}
{{--                </label>--}}
                <label>
                    <select  name="gender" class="h3-like" style="" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </label><br><br>
            </div>

            <h2>Date of brith</h2>
            <div class="box">
                <label for="birthdate"></label><input type="date" name="birth_day" id="birthdate" class="no-border" required/>
            </div>

            <h2>Neutered</h2>
            <div class="box">
               <!-- <h3>Enter if pet neutered</h3> -->
{{--                <label>--}}
{{--                    <select  name="neutered" class="h3-like" style="" required>--}}
{{--                        <option value="no">No</option>--}}
{{--                        <option value="yes">Yes</option>--}}
{{--                    </select>--}}
{{--                </label><br><br>--}}

                <input type="hidden" name="neutered" value="0">
                <label>
                    <input type="checkbox" name="neutered" value="1"><br><br>
                </label>
            </div>

            <h2>Chip/pet passport</h2>
            <div class="box">
                <label>
                    <input type="text" class="h3-like" name="chip" placeholder="Enter a chip of pet" required>
                </label>
            </div>

            <h2>Breed</h2>
            <div class="box">
                <label>
                    <input type="text" class="h3-like" name="breed" placeholder="Enter breed of pet" required>
                </label>
            </div>

            <h2>Weight</h2>
            <div class="box">
                <label>
                    <input type="number" class="h3-like" name="weight" placeholder="Enter pet weight" required>
                </label>
            </div>

            <div class="button">
                <button type="submit" class="btn">Submit</button>
            </div>
            </form>
        </div>
    </div>
@endsection
