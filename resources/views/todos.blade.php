@extends('layout')

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form action="/create/todo" method="post">
            {{ csrf_field() }}
            <input name="todo" type="text" class="form-control input-lg" placeholder="Create a new todo"/>
        </form>
    </div>
</div>

@section('content')
                @foreach($todos as $todo)
                    {{ $todo->todo }}
                    <hr>
                @endforeach
@stop