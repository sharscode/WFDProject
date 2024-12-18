@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center fw-bold display-4">Events in Surabaya</h1>


        <div class="row">
            @forelse ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded">
                        <!-- Gambar di bagian atas kartu -->
                        <div class="position-relative">
                            <img src="{{ $event->image_banner ? asset('images/' . $event->image_banner) : asset('images/default.jpg') }}" 
                                 alt="{{ $event->title }}" 
                                 class="card-img-top img-fluid rounded-top" 
                                 style="height: 200px; object-fit: cover;">
                            <!-- Overlay Gradient -->
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25 rounded-top"></div>
                        </div>

                        <!-- Isi Kartu -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $event->title }}</h5>
                            <p class="card-text mb-3 text-muted">
                                <strong>Venue:</strong> {{ $event->venue }}<br>
                                <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }}<br>
                                <strong>Time:</strong> {{ $event->start_time }}<br>
                                <strong>Organizer:</strong> {{ $event->organizer->name }}
                            </p>

                            <!-- Tags Section -->
                            @if ($event->tags)
                                <div class="mb-2">
                                    @foreach (explode(',', $event->tags) as $tag)
                                        <span class="badge bg-info text-dark me-1">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Tombol Detail -->
                            <div class="mt-auto">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-12 text-center mt-5">
                    <img src="{{ asset('images/empty-state.png') }}" alt="No Events" style="width: 200px;" class="mb-3">
                    <h3 class="text-muted">No events available in Surabaya at the moment.</h3>
                </div>
            @endforelse
        </div>
    </div>
@endsection
