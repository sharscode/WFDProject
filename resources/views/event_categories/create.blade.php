@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Event Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 

        <form action="{{ route('event_categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('event_categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection