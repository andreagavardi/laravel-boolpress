@extends('layouts.admin')




@section('content')
<div class="container d-flex flex-column">
    <h1 class="align-self-center mt-2">Edit Article</h1>
    @include('partials.errors')
    <form action="{{route('admin.articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" aria-describedby="helpId" value="{{($article->title)}}">
            <small id="helpId" class="text-muted">Inserisci il titolo dell'articolo</small>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Choose a Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{$category->id == old('category_id',$article->category_id)? 'selected': ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags[]">Tags</label>
            <select multiple class="form-control" name="tags[]" id="tags[]">
                <option value="" disabled>Select a Tag</option>
                @foreach($tags as $tag)
                <option value="{{$tag->id}}" {{$article->tags->contains($tag)? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            </select>
            @error('tags[]')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Corpo</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="body" id="body" rows="3">{{($article->body)}}</textarea>
            <small id="helpId" class="text-muted">Inserisci il nuovo articolo</small>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image" class="d-block">Copertina</label>
            <img width="200" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
            <input type="file" name="image" id="image">
            <small id="helpId" class="text-muted d-block">Inserisci l'url dell'immagine</small>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" placeholder="Nome e Cognome" aria-describedby="helpId" value="{{($article->author)}}">
            <small id="helpId" class="text-muted">Inserisci l'autore dell'articolo</small>
            @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <a name="" id="" class="btn btn-warning" href="{{route('admin.articles.index')}}" role="button"><i class="fa fa-chevron-left mr-2" aria-hidden="true"></i>BACK</a>
        <button type="submit" class="btn btn-success">DONE</button>
    </form>
</div>
@endsection
