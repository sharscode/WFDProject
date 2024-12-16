@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Detail</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">
                    <strong>Venue:</strong> {{ $event->venue }}<br>
                    <strong>Date and Time:</strong> {{ $event->date }} - {{ $event->start_time }}<br>
                    <strong>Organizer:</strong> {{ $event->organizer->name }}<br>
                    <strong>Category:</strong> {{ $event->eventCategory->name }}<br> 
                    <strong>Booking URL:</strong> {{ $event->booking_url }}<br>
                    <strong>About:</strong> {{ $event->description }}<br>
                    <strong>Tags:</strong> {{ $event->tags }}
                </p>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a> 
            </div>
        </div>
    </div>
@endsection