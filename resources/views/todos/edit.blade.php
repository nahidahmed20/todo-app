@extends('master')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Edit To-do</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group py-4">
                    <label class="py-2">Title:</label>
                    <input type="text" class="form-control"   placeholder="Title" value="{{ $todo->title }}" name="title">
                </div>
                <div class="form-group py-4">
                    <label class="py-2">Description:</label>
                    <textarea name="description" class="form-control"  placeholder="Description">{{ $todo->description }}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>

    </div>
</div>

@endsection
