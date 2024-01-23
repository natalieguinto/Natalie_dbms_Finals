@extends('layouts.app')

@section('title', 'Edit Participant')

@section('content')

    <hr>
    <h1>Edit Participant</h1>

    <form method="POST" action="{{ route('participants.update', $participant->id) }}">
        @csrf
        @method('PUT')

        <label for="participant_name">Participant Name:</label>
        <input type="text" name="participant_name" value="{{ $participant->participant_name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $participant->email }}" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $participant->phone }}" required>

        <button type="submit">Update Participant</button>
    </form>

    <br>

    <a href="{{ route('participants.show', ['id' => $participant->id]) }}">Back to Participant</a>
@endsection