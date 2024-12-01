@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_investi.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')

    <!--TEMP -->
{{--    <h1>Your Pets</h1>--}}

{{--    @if($pets->isEmpty())--}}
{{--        <p>You don't have any pets yet!</p>--}}
{{--    @else--}}
{{--        <ul>--}}
{{--            @foreach ($pets as $pet)--}}
{{--                <li>--}}
{{--                    <strong>Species:</strong> {{ $pet->species }} <br>--}}
{{--                    <strong>Gender:</strong> {{ $pet->gender }} <br>--}}
{{--                    <strong>Breed:</strong> {{ $pet->breed }} <br>--}}
{{--                    <strong>Weight:</strong> {{ $pet->weight }} kg <br>--}}
{{--                    <strong>Chip/Passport:</strong> {{ $pet->chip}} <br>--}}
{{--                    <hr>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}
    <!--TEMP -->

    <h2 class="pet-page-title">MY PETS</h2>
    <div class="circle-container">
        <div class="circle pet-page" onclick="window.location.href='{{ route('petprofile') }}'">
            <img src="https://images.squarespace-cdn.com/content/v1/53c5b010e4b0c3db71b3067c/52516f73-7d9d-4f75-9c40-20024ac082d0/pexels-anna-shvets-4587992.jpg" alt="pic">
        </div>
        <div class="circle pet-page" onclick="window.location.href='{{ route('petprofile') }}'">
            <img src="https://vitapet.com/media/11cnerod/mypet_intro_cat-2x.jpg?anchor=center&mode=crop&width=295&height=240&rnd=132175079295930000" alt="img2">
        </div>
        <div class="circle pet-page" onclick="window.location.href='{{ route('petedit') }}'"> <i class="bi bi-plus"></i> </div>
    </div>
@endsection
