@extends('layouts.app')

@section('content')
    <h1>Events in Surabaya</h1>

    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4">
                <div class="card">
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