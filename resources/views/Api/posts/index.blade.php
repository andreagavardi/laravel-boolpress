@extends('layouts.app')

@section('content')
<div class="container posts">
    <h1 class="text-center text-uppercase">Posts</h1>
    <div class="row">


        <div class="card post w-25 m-2" v-for="post in posts">
            <a href="#">
                <img class="card-img-top" :src="'storage/' + post.image" :alt="post.title">
            </a>
            <div class="card-body">
                <h4 class="card-title text-uppercase">@{{post.title}}</h4>
                <div class="tags">
                    <strong >Tags: </strong>
                    <span class="tag" v-for="tag in post.tags" v-if="post.tags">@{{tag.name}} </span>
                    <span v-else> No Tags Yet</span>

                </div>
                <h5> Category:
                    <a href="#">
                        @{{post.category.name}}
                    </a>
                </h5>
                <span>Autore: @{{post.author}}</span>
                <div class="card-text">
                    @{{post.body}}
                </div>
                <a href="#">Read More</a>
            </div>
        </div>

    </div>
</div>
@endsection
