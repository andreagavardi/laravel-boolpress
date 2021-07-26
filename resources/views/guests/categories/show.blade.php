@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Articles in {{$category->name}}</h1>
</div>
<div class="container">
    @foreach($category->articles as $article)
    <div class="card">
        <img class="card-img-top" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}} Image">
        <div class="card-body">
            <h4 class="card-title">{{$article->title}}</h4>
            <p class="card-text">{{$article->body}}</p>
        </div>
    </div>
</div>
@endforeach
@endsection
