@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Event</h1>        
    

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 


        <form action="{{ route('events.store') }}" method="POST"> 
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                 <input type="file" class="form-control" id="image_banner" name="image_banner" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required> 
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required> 
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}" required> 
            </div>
            <div class="mb-3">
                <label for="venue" class="form-label">Location</label>
                <input type="text" class="form-control" id="venue" name="venue" value="{{ old('venue') }}" required> 
            </div>
            <div class="mb-3">
                <label for="organizer_id" class="form-label">Organizer</label>
                <select class="form-select" id="organizer_id" name="organizer_id" required>
                    <option value="">Select Organizer</option> 
                    @foreach ($organizers as $organizer)
                        <option value="{{ $organizer->id }}" {{ old('organizer_id') == $organizer->id ? 'selected' : '' }}> 
                            {{ $organizer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="event_category_id" class="form-label">Event Category</label>
                <select class="form-select" id="event_category_id" name="event_category_id" required>
                    <option value="">Select Event Category</option>
                    @foreach ($eventCategories as $eventCategory)
                        <option value="{{ $eventCategory->id }}" {{ old('event_category_id') == $eventCategory->id ? 'selected' : '' }}> 
                            {{ $eventCategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="booking_url" class="form-label">Booking URL</label>
                <input type="text" class="form-control" id="booking_url" name="booking_url" value="{{ old('booking_url') }}"> 
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">About</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea> 
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}"> 
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a> 
        </form>
    </div>
@endsection