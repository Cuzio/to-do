@extends('layouts.app')
@section("title", "To-do")
@section('content')
<div class="container welcome">
    <h1 class="text-center">Welcome there!!!</h1>
    <div class="task-container">
        <h3>Today's tasks</h3>
        @foreach($events as $event)
        <div class="tasks">
            <input type="checkbox" name="{{ $event->is_completed }}" id="" class="task-box">
            <div class="text-center">
                <p>{{ $event->title }}</p>
                <p>{{ $event->description }}</p>
            </div>
            <div class="task-buttons">
                <button class="btn btn-warning task-button">Edit</button>
                <button class="btn btn-warning task-button">Delete</button>
            </div>
        </div>
        @endforeach
        <div class="new-task">
            <button class="new-task-button">
                <a href="{{ route('todo') }}" class="text-decoration-none new-task-link">
                    <h1>+</h1>
                </a>
            </button>
        </div>
    </div>
    @endsection