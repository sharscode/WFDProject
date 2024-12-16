@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Organizer Detail</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $organizer->name }}</h5>
                <p class="card-text">
                    <strong>Facebook:</strong> {{ $organizer->facebook_link }}<br>
                    <strong>X:</strong> {{ $organizer->x_link }}<br>
                    <strong>Website:</strong> {{ $organizer->website_link }}<br>
                    <strong>About:</strong> {{ $organizer->description }}
                </p>
                <a href="{{ route('organizers.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection