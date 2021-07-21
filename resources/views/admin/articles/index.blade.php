@extends('layouts.admin')

@section('content')
<div class="container articles d-flex flex-column align-items-center my-3">
    <h1>Posts</h1>
    <a class="btn btn-outline-dark my-4" href="{{route('admin.articles.create')}}" role="button">Add an Article</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>IMAGE</th>
                <th>BODY</th>
                <th>AUTHOR</th>
                <th>UPDATED AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td scope="row">{{$article->id}}</td>
                <td>{{$article->title}}</td>

                <td>
                    <img width="100" src="{{$article->image}}" alt="{{$article->title}}">
                </td>
                <td>{{$article->body}}</td>
                <td>{{$article->author}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    <div class="actions d-flex flex-xl-column align-items-center">
                        <a href="{{route('articles.show',$article->id)}}" class="btn btn-outline-dark">View</a>
                        <a class="btn btn-outline-dark my-1 px-3" href="#" role="button">Edit</a>
                        <a class="btn btn-danger my-1 px-3" href="#" role="button">Delete</a>
                    </div>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
