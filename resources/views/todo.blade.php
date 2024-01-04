@extends('layouts.app')
@section("title", "To-do")
@section('content')
<div class="container text-center mt-5">
    <div>
        <h1>TO-DO NOW</h1>
        <hr>
    </div>
    <div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="To-do" aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
        </div>

    </div>
</div>
@endsection