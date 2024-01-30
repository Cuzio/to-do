@extends('layouts.app')
@section("title", "Edit To-do")
@section('content')
<div class="todo">
    <div class="container text-center mt-5">
        <div>
            <h1 class="mt-5">TO-DO NOW</h1>
            <hr class="mt-5">
        </div>
        <div class="mt-5">

            <form action="{{ route('update.todo', $event->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $event->title }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="description" id="" cols="5" rows="5"
                        class="form-control">{{ $event->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
