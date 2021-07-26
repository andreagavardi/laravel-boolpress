@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Articles in {{$category->name}}</h1>
</div>
<div class="container category_posts d-flex flex-wrap">
    @foreach($articles as $article)
    <div class="card">
        <img class="card-img-top" width="150" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}} Image">
        <div class="card-body">
            <h4 class="card-title">{{$article->title}}</h4>
            <span><strong>Scritto da: </strong> {{$article->author}}</span><br>
            <span><strong>in data: </strong>{{$article->updated_at}}</span>
            <p class="card-text">{{$article->body}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
