@extends('layouts.app')

@section('content')
<div class="container">
    <div class="article d-flex justify-content-center align-items-center py-3 flex-wrap">
        <div class="article_top d-flex flex-column align-items-center col-6 ">
            <h2 class=" text-center text-uppercase mb-4">{{$article->title}}</h2>
            <img width="200" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
        </div>

        <div class="col-6">
            <div class="tags">
                <strong>Tags: </strong>
                @forelse($article->tags as $tag)
                <span class="tag">{{$tag->name}}</span>
                @empty <span> No Tags Yet</span>
                @endif
            </div>
            <p>{{$article->body}}</p>

        </div>
        <div class="article_spec col-12 mt-5">
            <h5>Category:
                @if($article->category)
                {{$article->category->name}}
                @else
                Uncategorized
                @endif
            </h5>
            <span><strong>Scritto da: </strong> {{$article->author}}</span><br>
            <span><strong>in data: </strong>{{$article->updated_at}}</span>
        </div>
    </div>

</div>
@endsection
