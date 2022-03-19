@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">Todos Page</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Todos
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        {{$todo->name}}
                        @if (!$todo->completed)
                        <a href="/todos/{{ $todo->id }}/complete" class="btn btn-success mx-2 btn-sm float-end">Complete</a>
                        @endif
                        <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-end">View</a>
                     </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
