@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Event Detail</h1>
        <div class="card shadow-sm">
            <!-- Gambar di bagian atas kartu -->
            @if ($event->image_banner)
                <img src="{{ asset('images/' . $event->image_banner) }}" 
                     alt="{{ $event->title }}" 
                     class="card-img-top img-fluid" 
                     style="height: 300px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default.jpg') }}" 
                     class="card-img-top img-fluid" 
                     alt="Default Image" 
                     style="height: 300px; object-fit: cover;">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">
                    <strong>Venue:</strong> {{ $event->venue }}<br>
                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }}<br>
                    <strong>Time:</strong> {{ $event->start_time }}<br>
                    <strong>Organizer:</strong> {{ $event->organizer->name }}<br>
                    <strong>Category:</strong> {{ $event->eventCategory->name }}<br> 
                    <strong>Booking URL:</strong> 
                    @if ($event->booking_url)
                        <a href="{{ $event->booking_url }}" target="_blank">{{ $event->booking_url }}</a>
                    @else
                        <span class="text-muted">No URL available</span>
                    @endif
                    <br>
                    <strong>About:</strong> {{ $event->description }}<br>
                    
                    <!-- Tags Section -->
                    <strong>Tags:</strong>
                    @if ($event->tags)
                        @foreach (explode(',', $event->tags) as $tag)
                            <span class="badge bg-primary me-1">{{ trim($tag) }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No tags available</span>
                    @endif
                </p>

                <!-- Tombol Back -->
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>  
            </div>
        </div>
    </div>
@endsection
