@extends('layouts.header_logged')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style_chat.css') }}?v={{ time() }}" rel="stylesheet">
@stop

@section('content')
<div class="container-ev">
    <div class="people-containerr">
        <h3>Available doctors</h3>
        @foreach($doctors as $doctor)
            <div class="person-wrapper">
                <div class="person-circle" title="{{ $doctor->name }}">
                    @if($doctor->user->photo)
                        <img src="{{ asset('storage/' . $doctor->user->photo) }}" alt="User Photo" class="user-photo">
                    @else
                        <i class="bi bi-person"></i>
                    @endif
                </div>
                <span class="person-name">{{ $doctor->user->name }}</span>
            </div>
        @endforeach
    </div>
    <div class="chat-container">
        <div class="chat-messages" id="chat-messages">
        </div>
        <form id="chat-form">
            @csrf
            <label for="message-input"></label><input type="text" name="message" id="message-input" placeholder="Type a message..." required>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
@endsection
