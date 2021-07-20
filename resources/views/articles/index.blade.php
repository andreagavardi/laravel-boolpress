@extends('layouts.app')

@section('content')
<div class="container posts  ">
    <h1>Posts</h1>
    <div class="row">
        @foreach($articles as $article)

        <div class="card post">
            <img class="card-img-top" src="{{$article->image}}" alt="{{$article->title}}">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <span>Autore: {{$article->author}}</span>
                <p class="card-text">{{$article->body}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
