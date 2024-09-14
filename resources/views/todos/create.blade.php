@extends('master')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Create To-do</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group py-4">
                    <label class="py-2">Title:</label>
                    <input type="text" class="form-control"   placeholder="Title" name="title">
                </div>
                <div class="form-group py-4">
                    <label class="py-2">Description:</label>
                    <textarea name="description" class="form-control"  placeholder="Description"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>

@endsection
