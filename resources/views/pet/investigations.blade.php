@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_investi.css') }}?v={{ time() }}" rel="stylesheet">
    <script src="{{ asset('js/investigations_script.js') }}?v={{ time() }}" defer></script>

@stop

@section('content')
    <div class="circle-container">
        <div class="circle-wrapper">
            @foreach($pets as $key => $pet)
                <div class="circle">
                    @if($pet->photo)
                        <img src="{{ asset('storage/' . $pet->photo) }}" alt="{{ $pet->name }}">
                    @else
                        <i class="bi bi-camera"></i>
                    @endif
                </div>
            @endforeach
            <div class="circle" onclick="window.location.href='{{ route('petedit') }}'">
                <i class="bi bi-plus"></i>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach($pets as $key => $pet)
            <div class="investigation-container" id="investigations-pet-{{ $key }}" style="display: {{ $key === 0 ? 'block' : 'none' }}">
                @foreach($pet->investigations->sortByDesc('date') as $investigation)
                    <div class="information">
                        <div class="date-container">
                            <h2>{{ \Carbon\Carbon::parse($investigation->date)->format('d.m.Y') }}</h2>
                        </div>

                        <div class="small-circles">
                            <!--  <div class="small-circle"><i class="bi bi-clipboard2-pulse"></i></div> -->
                            <!-- Zakomentovaný kruh s liekom -->
                            <!-- <div class="small-circle"><i class="bi bi-capsule"></i></div> -->
                            <div class="small-circle"><i class="bi bi-clipboard2-pulse"></i></div>
                        </div>

                        <div class="name-container">
                            <div class="text">
                                <h3>MUDR. {{ $investigation->doctor->user->name }} {{ $investigation->doctor->ordination }}</h3>
                                <h3>{{ $investigation->doctor->user->name }} </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
