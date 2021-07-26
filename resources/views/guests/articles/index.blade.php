@extends('layouts.app')

@section('content')
<div class="container posts  ">
    <h1 class="text-center text-uppercase">Posts</h1>
    <div class="row">
        @foreach($articles as $article)

        <div class="card post">
            <a href="{{route('articles.show', $article->id)}}">
                <img class="card-img-top" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
            </a>
            <div class="card-body">
                <h4 class="card-title text-uppercase">{{$article->title}}</h4>
                <h5> Category:
                    @if($article->category)
                    {{$article->category->name}}
                    @else Uncategorized
                    @endif
                </h5>
                <span>Autore: {{$article->author}}</span>
                <div class="card-text">{{$article->body}}
                </div>
                <a href="{{route('articles.show', $article->id)}}">Read More</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
