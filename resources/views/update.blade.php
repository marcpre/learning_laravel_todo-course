@extends('layout')

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('todos.save', ['id' => $todo->id]) }}" method="post">
            {{ csrf_field() }}
            <input name="todo" type="text" class="form-control input-lg" placeholder="{{ todo->todo }}"/>
        </form>
    </div>
</div>
