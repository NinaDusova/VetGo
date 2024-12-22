@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_investi.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <h2 class="pet-page-title">MY PETS</h2>
    <div class="circle-container">
        <div class="circle-wrapper">
            @foreach($pets as $pet)
                <div class="circle pet-page" onclick="window.location.href='{{ route('petprofile', ['id' => $pet->id]) }}'">
                    @if($pet->photo)
                     <img src="{{ asset('storage/' . $pet->photo) }}" alt="{{ $pet->name }}">
                    @endif
                </div>
            @endforeach
            <div class="circle pet-page" onclick="window.location.href='{{ route('petedit') }}'">
                <i class="bi bi-plus"></i>
            </div>
        </div>
    </div>
@endsection
