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
            <h2>Spieces</h2>
            <div class="box">
                <h3>Enter a type of spieces</h3>
            </div>

            <h2>Gender</h2>
            <div class="box">
                <h3>Enter gender of your pet</h3>
            </div>

            <h2>Date of brith</h2>
            <div class="box">
                <label for="birthdate"></label><input type="date" name="birthdate" id="birthdate" class="no-border"/>
            </div>

            <h2>Neutered</h2>
            <div class="box">
                <h3>Enter date of birth</h3>
            </div>

            <h2>Chip/pet passport</h2>
            <div class="box">
                <h3>Enter date of birth</h3>
            </div>

            <h2>Breed</h2>
            <div class="box">
                <h3>Enter type of breed</h3>
            </div>

            <h2>Weight</h2>
            <div class="box">
                <h3>Enter weight</h3>
            </div>

            <div class="button">
                <button class="btn">Submit</button>
            </div>
        </div>
    </div>
@endsection
