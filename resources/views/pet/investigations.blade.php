@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_investi.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
<div class="circle-container">
    <div class="circle-wrapper">
        @foreach($pets as $pet)
            <div class="circle">
                @if($pet->photo)
                    <img src="{{ asset('storage/' . $pet->photo) }}" alt="{{ $pet->name }}">
                @endif
            </div>
        @endforeach
        <div class="circle" onclick="window.location.href='{{ route('petedit') }}'">
            <i class="bi bi-plus"></i>
        </div>
    </div>
</div>

    <div class="container">
        <div class="date-container">
            <h2>07.07.2024</h2>
            <h2>18.06.2024</h2>
            <h2>10.05.2024</h2>
        </div>

        <div class="small-circles">
            <div class="small-circle"><i class="bi bi-clipboard2-pulse"></i></div>
            <div class="small-circle"><i class="bi bi-capsule"></i></div>
            <div class="small-circle"><i class="bi bi-clipboard2-pulse"></i></div>
        </div>

        <div class="name-container">
            <div class="text">
                <h3>MUDR. VIERA VÝCHODNÁ S.R.O - KOŠICE</h3>
                <h3>VIERA VYCHODNÁ</h3>
            </div>

            <div class="text-dif">
                <h3>VYBRATÝ 20.6.2022</h3>
                <h3>CANIVERM FORTE</h3>
                <h3>CENA PRODUKTU: 7.48€</h3>
            </div>

            <div class="text">
                <h3>MUDR. VIERA VÝCHODNÁ S.R.O - KOŠICE</h3>
                <h3>VIERA VYCHODNÁ</h3>
            </div>
        </div>
    </div>
@endsection
