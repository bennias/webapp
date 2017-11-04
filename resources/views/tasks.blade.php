@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="container">
            <h2>Tasks List</h2>
            <a href="/task" class="btn btn-task">Add new Task</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4>To Do</h4>
                </div>
            </div>
            @foreach($user->tasks as $task)
                <div class="row card">
                    <div class="col-md-3">
                        <p class="bold">{{$task->task_name}}</p>
                    </div>
                    <div class="col-md-5">
                        <p>{{$task->description}}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{$task->created_at}}</p>
                    </div>
                    <div class="col-md-2">
                        <form action="/task/{{$task->id}}">
                        <button type="submit" name="done" formmethod="POST" class="btn btn-success">Done</button>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        <!-- <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button> -->
                        {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container table-done">
            <div class="row">
                <div class="col-xs-12">
                    <h4>Erledigt</h4>
                </div>
            </div>
            @foreach($user->tasks as $task)
                <div class="row card">
                    <div class="col-md-3">
                        <p class="bold">{{$task->task_name}}</p>
                    </div>
                    <div class="col-md-5">
                        <p>{{$task->description}}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{$task->created_at}}</p>
                    </div>
                    <div class="col-md-2">
                        <form action="/task/{{$task->id}}">
                            <button name="" class="btn btn-secondary">Undo</button>
                            <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endforeach
        </div>


        @else
            <h3>You need to log in. <a href="/login">Click here to login</a></h3>
        @endif     
    </div>
@endsection