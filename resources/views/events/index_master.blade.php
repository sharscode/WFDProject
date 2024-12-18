@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Master Event</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create</a>  
    <table class="table" id="eventTable"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Event Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Organizer</th>
                <th>Category</th> 
                <th>About</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr data-event-id="{{ $event->id }}"> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date }} - {{ $event->start_time }}</td> 
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->organizer->name }}</td>
                    <td>{{ $event->eventCategory->name }}</td> 
                    <td>{{ Str::limit($event->description, 100) }}</td>
                    <td>
                        @if ($event->tags)
                            @foreach (explode(',', $event->tags) as $tag)
                                <span class="badge bg-primary">{{ trim($tag) }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">No tags</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>  
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">  
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }} 
</div>

<script>
    const table = document.getElementById('eventTable');
    table.addEventListener('click', (event) => {
        const row = event.target.closest('tr'); 
        if (row) {
            const eventId = row.dataset.eventId; 
            window.location.href = `/events/${eventId}`; 
        }
    });
</script>
@endsection
