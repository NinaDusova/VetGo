@extends('layouts.header_not_logged')

@section('header')
    <link href="{{ asset('css/style_puzzle.css') }}?v={{ time() }}" rel="stylesheet">
@stop

@section('content')
    <h1>Sliding Puzzle</h1>
    <p>Arrange the tiles to make a picture!</p>
    <div class="puzzle-container" id="puzzle-container"></div>
    <button class="btn-to-about-page" onclick="puzzle.shuffle()">Shuffle</button>
    <button class="btn-to-about-page" onclick="puzzle.reset()">Reset</button>
    <script src="{{ asset('js/puzzle.js') }}"></script>
@endsection


