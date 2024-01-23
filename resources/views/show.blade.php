@extends('layouts.app')

@section('title', 'Events and Participants')

@section('content')
    <hr>

    <h1>Participants</h1>

    <form method="POST" action="{{ route('participants.store') }}">
        @csrf
        <label for="participant_name">Participant Name:</label>
        <input type="text" name="participant_name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>
        
        <button type="submit">Add Participant</button>
    </form>

    @if(isset($participants) && count($participants) > 0)
    <ul>
        @foreach($participants as $participant)
            <li>
                <strong>{{ $participant->participant_name }}</strong><br>
                <p>Email: {{ $participant->email }}</p>
                <p>Phone: {{ $participant->phone }}</p>

                <a href="{{ route('participants.edit', $participant->id) }}"><button type="submit">Edit</button></a>

                <form method="POST" action="{{ route('participants.destroy', $participant->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Participant</button>
                </form>
            </li>
        @endforeach
    </ul>
    @else
        <p>No participants available.</p>
        
    @endif
@endsection