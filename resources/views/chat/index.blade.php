@extends('layouts.header_logged')

@section('header')
    <meta name="base-url" content="{{ url('') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style_chat.css') }}?v={{ time() }}" rel="stylesheet">
    <script src="{{ asset('js/chat.js') }}" defer></script>
@stop

@section('content')
    <div class="container-ev">
        <div class="people-containerr">
            <h3>
                @if(isset($doctors))
                    Available Doctors
                @elseif(isset($users))
                    Available Users
                @endif
            </h3>

            @if(isset($doctors))
                @foreach($doctors as $doctor)
                    <div class="person-wrapper">
                        <div class="person-circle" data-id="{{ $doctor->user->id }}" title="{{ $doctor->user->name }}">
                            @if($doctor->user->photo)
                                <img src="{{ asset('storage/' . $doctor->user->photo) }}" alt="User Photo" class="user-photo">
                            @else
                                <i class="bi bi-person"></i>
                            @endif
                        </div>
                        <span class="person-name">{{ $doctor->user->name }}</span>
                    </div>
                @endforeach
            @elseif(isset($users))
                @foreach($users as $user)
                    <div class="person-wrapper">
                        <div class="person-circle" data-id="{{ $user->id }}" title="{{ $user->name }}">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="user-photo">
                            @else
                                <i class="bi bi-person"></i>
                            @endif
                        </div>
                        <span class="person-name">{{ $user->name }}</span>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="chat-container">
            <div class="chat-messages" id="chat-messages"></div>
            <form id="chat-form">
                @csrf
                <input type="hidden" name="receiver_id" id="receiver-id" value="">
                <label for="message-input"></label>
                <input type="text" name="message" id="message-input" placeholder="Type a message..." required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
@endsection
