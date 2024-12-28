@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_logged.css') }}?v={{ time() }}" rel="stylesheet">

@stop

@section('content')
    <div class="container-r">
        <h2>Pets under your care</h2>

        <form method="GET" action="{{ route('search') }}" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search by name or chip ID" value="{{ request()->input('search') }}">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>

        <div class="add-pet-button">
            <button onclick="window.location.href='{{ route('addpet') }}'" class="btn">Add Pet</button>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>Chip ID</th>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Gender</th>
                    <th>Neutered</th>
                    <th>Weight</th>
                    <th>Birth day</th>
                    <th>Added at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td>{{ $pet->chip }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->species }}</td>
                        <td>{{ $pet->breed }}</td>
                        <td>{{ $pet->gender }}</td>
                        <td>{{ $pet->neutered ? 'Yes' : 'No' }}</td>
                        <td>{{ $pet->weight }}</td>
                        <td>{{ $pet->birth_day }}</td>
                        <td>{{ $pet->created_at }}</td>
                        <td>
                            <button onclick="window.location.href='{{ route('doctor.editPet', $pet->id) }}'"
                                    class="btn btn-sm">Edit</button>
                            <form action="{{ route('removepet', $pet->id) }}" method="POST"
                                  style="display: inline;" onsubmit="return confirm('Are you sure you want to remove this pet?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delbtn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
