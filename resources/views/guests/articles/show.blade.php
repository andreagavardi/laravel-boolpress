@extends('layouts.app')

@section('content')
<div class="container">
    <div class="article d-flex justify-content-center align-items-center py-3 flex-wrap">
        <div class="article_top d-flex flex-column align-items-center col-6 ">
            <h2 class=" text-center mb-4">{{$article->title}}</h2>
            <img width="200" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
        </div>
        <p class="col-6">{{$article->body}}</p>
        <div class="article_spec col-12 mt-5">
            <span><strong>Scritto da: </strong> {{$article->author}}</span><br>
            <span><strong>in data: </strong>{{$article->updated_at}}</span>
        </div>
    </div>

</div>
@endsection
