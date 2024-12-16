@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Organizer</h1>
        <a href="{{ route('organizers.create') }}" class="btn btn-primary mb-3">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Organizer Name</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizers as $organizer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $organizer->name }}</td>
                        <td>{{ Str::limit($organizer->description, 100) }}</td>
                        <td>
                            <a href="{{ route('organizers.show', $organizer->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('organizers.edit', $organizer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $organizers->links() }} 
    </div>
@endsection