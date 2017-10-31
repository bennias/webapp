@extends('layouts.app')

@section('content')
<div class="container">
    
    <h2>Add New Task</h2>    
           
    <form id="AddTask" method="POST" action="/task">
        <div class="form-group">
            <textarea name="description" class="form-control" required></textarea>  
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>

        {{ csrf_field() }}
    </form>
    <script>
        $("#AddTask").validate();
    </script>

</div>
@endsection


