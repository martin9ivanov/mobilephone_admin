@extends('layouts.app')

@section('content')

    <h1>Add new product</h1>

    <form method="POST" action="submit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="screen" placeholder="Screen size">
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control">Description</textarea>
        </div>
        <div class="form-group">
            <select name="brand_id" class="form-control">
                @foreach($brands as $name=>$id)
                <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="os_id" class="form-control">
                @foreach($os as $name=>$id)
                <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add product</button>
        </div>
    </form>

@stop