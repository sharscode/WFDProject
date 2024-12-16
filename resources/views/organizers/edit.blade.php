@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Organizer</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 

        <form action="{{ route('organizers.update', $organizer->id) }}" method="POST"> 
            @csrf
            @method('PUT') 
            <div class="mb-3">
                <label for="name" class="form-label">Organizer Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $organizer->name) }}" required> 
            </div>
            <div class="mb-3">
                <label for="facebook_link" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $organizer->facebook_link) }}"> 
            </div>
            <div class="mb-3">
                <label for="x_link" class="form-label">X</label>
                <input type="text" class="form-control" id="x_link" name="x_link" value="{{ old('x_link', $organizer->x_link) }}"> 
            </div>
            <div class="mb-3">
                <label for="website_link" class="form-label">Website</label>
                <input type="text" class="form-control" id="website_link" name="website_link" value="{{ old('website_link', $organizer->website_link) }}"> 
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">About</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $organizer->description) }}</textarea> 
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('organizers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection