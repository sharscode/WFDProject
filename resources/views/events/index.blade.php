@extends('layouts.app')

@section('content')
    <h1>Events in Surabaya</h1>

    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4">
                <div class="card">
                    <!-- Gambar di bagian atas kartu -->
                    @if ($event->image)
                        <img src="{{ $event->image_banner ? asset('images/' . $event->image_banner) : asset('images/default.jpg') }}" alt="{{ $event->title }}" style="width: 100px; height: auto;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">
                            {{ $event->venue }}<br>
                            {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }} - {{ $event->start_time }}<br>
                            Organizer: {{ $event->organizer->name }}
                        </p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Detail</a> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
