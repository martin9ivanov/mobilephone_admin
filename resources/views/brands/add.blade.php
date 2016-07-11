@extends('layouts.app')

@section('content')
    <h1>Add new brand</h1>

    <form method="POST" action="submit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <textarea name="name" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add brand</button>
        </div>
    </form>

@stop