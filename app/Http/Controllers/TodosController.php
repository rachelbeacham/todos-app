<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    public function index() {

        return view('todos.index')->with('todos', Todo::all());

    }
    public function show($todoId) {

        return view('todos.show')->with('todo', Todo::find($todoId));

    }
    public function new() {

        return view('todos.create');

    }
    public function create() {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        //get request data
        $data = request()->all();

        // assign data to new todo model
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        // save the new todo model to the database
        $todo->save();

        // redirect user back to list of todos
        return redirect('/todos');
    }
}
