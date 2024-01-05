@extends('layouts.app')
@section("title", "To-do")
@section('content')
<div class="todo">
    <div class="container text-center mt-5">
        <div>
            <h1 class="to">TO-DO NOW</h1>
            <hr class="line">
        </div>
        <div>
            <form action="/createTodo" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3 w-75 mx-auto mt-5">
                    <input type="text" class="form-control" placeholder="To-do" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-dark p-4" type="button" id="button-addon2" value="Post">Add
                        task</button>
                </div>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                <hr class="line">
                <div class="list-container">
                    <div class="list">
                        <h3>This is task</h3>
                        <button class="btn"><img src="/images/Group 728.png" alt="delete"></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection