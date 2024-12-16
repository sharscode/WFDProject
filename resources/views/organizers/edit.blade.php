@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Organizer</h1>
        <form action="{{ route('organizers.update', $organizer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Organizer Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $organizer->name }}" required>
            </div>
            <div class="mb-3">
                <label for="facebook_link" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ $organizer->facebook_link }}">
            </div>
            <div class="mb-3">
                <label for="x_link" class="form-label">X</label>
                <input type="text" class="form-control" id="x_link" name="x_link" value="{{ $organizer->x_link }}">
            </div>
            <div class="mb-3">
                <label for="website_link" class="form-label">Website</label>
                <input type="text" class="form-control" id="website_link" name="website_link" value="{{ $organizer->website_link }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">About</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $organizer->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('organizers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection