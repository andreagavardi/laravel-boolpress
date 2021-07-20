@extends('layouts.admin')

@section('content')
<div class="container d-flex flex-column align-items-center my-3">
    <h1>Posts</h1>
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
                <td>VIEW| EDIT | DELETE</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
