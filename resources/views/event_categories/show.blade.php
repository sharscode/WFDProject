@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Category Detail</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $eventCategory->name }}</h5>
                <a href="{{ route('event_categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection