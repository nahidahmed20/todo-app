@extends('master')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="text-center">To-do List</h1>
    </div>
    <div class="card-body">
        <ul>
            @foreach($todos as $todo)
                <li>{{ $todo->title }} - {{ $todo->completed ? 'Completed' : 'Pending' }}</li>
            @endforeach
        </ul>
        @foreach ($todos as $todo)
            <div>
                <h3>{{ $todo->title }}</h3>
                <p>{{ $todo->description }}</p>
                <a class="btn btn-primary mb-2" href="{{ route('todos.edit', $todo->id) }}" role="button">Edit</a>
                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" class="form-control" placeholder="New Todo">
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        @endforeach
    </div>
</div>



@endsection