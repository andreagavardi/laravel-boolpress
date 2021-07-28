@extends('layouts.admin')

@section('content')
<div class="container articles d-flex flex-column align-items-center my-3">
    <div class="articles_main_top d-flex justify-content-around align-items-center w-100">
        <h1>Posts</h1>
        <a class="btn btn-outline-dark my-4" href="{{route('admin.articles.create')}}" role="button">Add an Article</a>
    </div>
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
                    <img width="100" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
                </td>
                <td>{{$article->body}}</td>
                <td>{{$article->author}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    <div class="actions d-flex flex-xl-column align-items-center">
                        <a href="{{route('admin.articles.show',$article->id)}}" class="btn btn-outline-dark">View</a>
                        <a class="btn btn-outline-dark my-1 px-3" href="{{route('admin.articles.edit',$article->id)}}" role="button">Edit</a>
                        <button class="btn btn-danger my-1 px-3" type="button" data-toggle="modal" data-target="#Modal-{{$article->id}}">Delete</button>

                    </div>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    @foreach($articles as $article)
    <!-- Modal -->
    <div class="modal fade" id="Modal-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> WARNING!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    You're going to delete this article forever, are you shure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{route('admin.articles.destroy',$article->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
