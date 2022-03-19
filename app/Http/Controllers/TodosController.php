<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    public function index() {

        return view('todos.index')->with('todos', Todo::all());

    }
    public function show(Todo $todo) {

        return view('todos.show')->with('todo', $todo);

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

        session()->flash('success', 'Todo Created Successfully.');

        // redirect user back to list of todos
        return redirect('/todos');

    }
    public function edit(Todo $todo) {

        return view('todos.edit')->with('todo', $todo);

    }
    public function update(Todo $todo) {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo Updated Successfully.');

        return redirect('/todos');
    }

    public function delete(Todo $todo) {

    $todo->delete();
    session()->flash('success', 'Todo Deleted Successfully.');
    return redirect('/todos');

    }
}
