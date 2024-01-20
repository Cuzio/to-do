@extends('layouts.app')
@section("title", "To-do")
@section('content')
<div class="container welcome">
    <h1 class="text-center mt-5">Welcome there!!!</h1>
    <div class="mt-5 w-50 mx-auto">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="task-container mt-5">
        <h3 class="today">Today's tasks</h3>
        @foreach($events as $event)
        <div class="tasks">
            <input type="checkbox" name="{{ $event->is_completed }}" id="" class="task-box">
            <div class="text-center">
                <p>{{ $event->title }}</p>
                <p>{{ $event->description }}</p>
            </div>
            <div class="task-buttons">
                <button class="btn btn-warning task-button"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn btn-warning task-button"><i class="fa-solid fa-trash"></i></button>
            </div>
        </div>
        @endforeach
        <div class="new-task">
            <button class="new-task-button">
                <a href="{{ route('todo') }}" class="text-decoration-none new-task-link">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </button>
        </div>
    </div>
    @endsection