@extends('layouts.app')

@section('content')

<h1 class="text-center my-5">Create Todos</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header text-center">Create New Todo</div>
            <div class="card-body">
                <form action="/create-todo" method="post">
                    <!--  @csrf is built in token protection from laravel to ensure post requests only come from our app, other wise they are not authorized  -->
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name">.
                    </div>
                    <div class="form-group my-3">
                        <textarea name="description" cols="5" rows="5" placeholder="Description" class="form-control"></textarea>
                    </div>
                    <div class="form-group float-end">
                        <button type="submit" class="btn btn-success">Create Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
