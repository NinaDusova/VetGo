@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_investi.css') }}?v={{ time() }}" rel="stylesheet">
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

    <div class="container-r">
        <h2>Add Investigation</h2>

        <form action="{{ route('store_investigation') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="chip">Pet Chip ID:</label>
                <select name="pet_id" class="form-control" required>
                    <option value="">Select a Pet</option>
                    @foreach($pets as $pet)
                        <option value="{{ $pet->id }}">{{ $pet->name }} ({{ $pet->chip }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Investigation Date:</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add Investigation</button>
        </form>
    </div>
@endsection
