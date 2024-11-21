@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="menu">
        <div class="image-rectangle">
            <i class="bi bi-camera"></i>
        </div>

        <div class="informations-profile">
            <h2>Spieces: [TYPE]</h2>

            <h2>Gender: [GENDER]</h2>

            <h2>Date of brith: [DATE]</h2>

            <h2>Neutered: [YES/NO]</h2>

            <h2>Chip/pet passport: [NUMBER]</h2>

            <h2>Breed: [BREED]</h2>

            <h2>Weight: [NUMBER]</h2>

        </div>

        <div class="button-edit">
            <i class="bi bi-pencil-square" onclick="window.location.href='{{ route('petedit') }}'"></i>
        </div>
@endsection
