@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">
@stop

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>Add Pet</h1>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('addpet.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="chip">Pet Chip ID:</label>
                <input type="text" name="chip" id="chip" class="form-control" placeholder="Enter Pet Chip ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Pet</button>
        </form>
    </div>
@endsection
