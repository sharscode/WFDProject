@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Category</h1>
        <a href="{{ route('event_categories.create') }}" class="btn btn-primary mb-3">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventCategories as $eventCategory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $eventCategory->name }}</td>
                        <td>
                            <a href="{{ route('event_categories.show', $eventCategory->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('event_categories.edit', $eventCategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('event_categories.destroy', $eventCategory->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $eventCategories->links() }} 
    </div>
@endsection