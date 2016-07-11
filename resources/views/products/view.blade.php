@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <div class="row">
            <a href="/products" class="btn btn-default">Back</a>
        </div>
        <div class="row">
            <h1 class="centered">{{$brand}} {{$products->title}}</h1>
        </div>
        <div class="row">
            <p class="centered"><b>Brand : </b> {{$brand}}</p>
        </div>
        <div class="row">
            <p class="centered"><b>Phone title : </b> {{$products->title}}</p>
        </div>
        <div class="row">
            <p class="centered"><b>OS : </b> {{$os}}</p>
        </div>
        <div class="row">
            <p class="centered"><b>Screen size : </b> {{$products->screen}}</p>
        </div>
        <div class="row">
            <p class="centered"><b>Description : </b> {{$products->description}}</p>
        </div>
        <div class="row">
            <p class="centered"><b>Add on : </b> {{$products->created_at}}</p>
        </div>
    </div>




@stop