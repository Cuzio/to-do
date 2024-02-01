@extends('layouts.app')
@section("title", "To-do")
@section('content')

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session()->get('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session()->get('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="container welcome">
    <h1 class="text-center mt-5">Welcome there!!!</h1>
    <div class="mt-5 w-50 mx-auto">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="task-container mt-5">
        <h3 class="today text-center">Today's tasks</h3>
        @foreach($events as $event)
        <div class="tasks">
            <input type="checkbox" name="{{ $event->is_completed }}" id="" class="task-box">
            <div class="text-center">
                <p>{{ $event->title }}</p>
                <p>{{ $event->description }}</p>
            </div>
            <div class="task-buttons">
                <button class="btn btn-warning task-button"><a href="{{ route('edit.todo', $event->id) }}"
                        class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></button>
                <form action="{{ route('delete.todo', $event->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-warning task-button mx-auto" onclick="return check()"><i class="fa-solid fa-trash"></i></button>
                </form>
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
    <script>
        const check = () => {
            const check = confirm('Are you sure you want to delete this post?');
            return check;
        }
        </script>
    @endsection
