@php use Carbon\Carbon; @endphp
@extends('layouts.header_logged')

@section('header')
    <link href="{{ asset('css/style_investi.css') }}?v={{ time() }}" rel="stylesheet">
@stop
@section('content')
    <form method="GET" action="{{ route('search_inv') }}" class="mb-3 d-flex">
        <label>
            <input type="text" name="search" class="form-control" placeholder="Search"
                   value="{{ request()->input('search') }}">
        </label>
        <button type="submit" class="btn btn-primary ml-2">Search</button>
    </form>

    <div class="container-r">
        <h2>Investigations</h2>
        <div class="add-investigation-button mb-3">
            <a href="{{ route('add_investigation') }}" class="btn btn-success">Add Investigation</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>Pet Name</th>
                    <th>Chip ID</th>
                    <th>Investigation Date</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($investigations as $investigation)
                    <tr>
                        <td>{{ $investigation->pet->name }}</td>
                        <td>{{ $investigation->pet->chip }}</td>
                        <td>{{ Carbon::parse($investigation->date)->format('d.m.Y') }}</td>
                        <td>{{ $investigation->description }}</td>
                        <td>
                            <a href="{{ route('edit_investigation', $investigation->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('delete_investigation', $investigation->id) }}" method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this investigation?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
