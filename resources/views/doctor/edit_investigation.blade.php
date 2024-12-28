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
        <h2>Edit Investigation</h2>
        <form action="{{ route('update_investigation', $investigation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="pet_name">Pet Name</label>
                <input type="text" id="pet_name" class="form-control" value="{{ $investigation->pet->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="chip">Chip ID</label>
                <input type="text" id="chip" class="form-control" value="{{ $investigation->pet->chip }}" disabled>
            </div>

            <div class="form-group">
                <label for="date">Investigation Date</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ \Carbon\Carbon::parse($investigation->date)->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ $investigation->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            <a href="{{ route('doctor.investigations') }}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
@endsection
