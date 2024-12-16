@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Organizer</h1>
        <form action="{{ route('organizers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Organizer Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="facebook_link" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="facebook_link" name="facebook_link">
            </div>
            <div class="mb-3">
                <label for="x_link" class="form-label">X</label>
                <input type="text" class="form-control" id="x_link" name="x_link">
            </div>
            <div class="mb-3">
                <label for="website_link" class="form-label">Website</label>
                <input type="text" class="form-control" id="website_link" name="website_link">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">About</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('organizers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection