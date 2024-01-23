@extends('layouts.app')

@section('title', 'Events and Participants')

@section('content')

    <hr>

    <h1>Events</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        
        <label for="date">Date:</label>
        <input type="date" name="date" required>
        
        <label for="location">Location:</label>
        <input type="text" name="location" required>
        
        <button type="submit">Add Event</button>
    </form>

    @if(isset($events) && count($events) > 0)
        <ul>
            @foreach($events as $event)
                <li>
                    <strong>{{ $event->event_name }}</strong><br>
                    <p>{{ $event->description }}</p>
                    <p>Date: {{ $event->date }}</p>
                    <p>Location: {{ $event->location }}</p>

                    <form method="POST" action="{{ route('events.destroy', $event->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete Event</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No events available.</p>
        
    @endif

    
@endsection