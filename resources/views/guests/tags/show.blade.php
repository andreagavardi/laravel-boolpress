@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Articles with <span class=" text-uppercase">{{$tag->name}} </span>tag</h1>
</div>
<div class="container category_posts d-flex flex-wrap justify-content-center">
    @foreach($articles as $article)
    <div class="card">
        <a href="{{route('articles.show', $article->id)}}">
            <img class="card-img-top" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
        </a>
        <div class="card-body">
            <h4 class="card-title">{{$article->title}}</h4>
            <span><strong>Scritto da: </strong> {{$article->author}}</span><br>
            <span><strong>in data: </strong>{{$article->updated_at}}</span>
            <div class="card-text">{{$article->body}}</div>
            <a href="{{route('articles.show', $article->id)}}">Read More</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
