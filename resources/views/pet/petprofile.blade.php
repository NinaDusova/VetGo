@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="menu">
        <div class="image-rectangle">
            @if($pet->photo)
                <img src="{{ asset('storage/' . $pet->photo) }}" alt="Pet Photo" class="user-photo">
            @else
                <i class="bi bi-camera"></i>
            @endif
        </div>

        <div class="informations-profile">
            <h2>Name: {{ $pet->name }}</h2>

            <h2>Spieces: {{ $pet->species }}</h2>

            <h2>Gender: {{ $pet->gender }}</h2>

            <h2>Date of brith: {{ $pet->birth_day }}</h2>

            <h2>Neutered: {{ $pet->neutered ? 'Yes' : 'No'}}</h2>

            <h2>Chip/pet passport: {{ $pet->chip }}</h2>

            <h2>Breed: {{ $pet->breed }}</h2>

            <h2>Weight: {{ $pet->weight }}</h2>

        </div>

        <div class="button-edit">
            <i class="bi bi-pencil-square" onclick="window.location.href='{{ route('petedit', ['id' => $pet->id]) }}'"></i>
        </div>
@endsection
