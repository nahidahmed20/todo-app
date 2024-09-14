<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Display all todos
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    // Show form to create a new todo
    public function create()
    {
        return view('todos.create');
    }

    // Store a new todo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    // Show edit form for a todo
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    // Update a todo
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    // Delete a todo
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}
