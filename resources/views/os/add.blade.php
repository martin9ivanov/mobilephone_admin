@extends('layouts.app')

@section('content')
    <h1>Add new OS</h1>

    <form method="POST" action="submit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <textarea name="name" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add OS</button>
        </div>
    </form>

@stop