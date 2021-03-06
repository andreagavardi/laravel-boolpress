@extends('layouts.admin')




@section('content')
<div class="container d-flex flex-column">
    <h1 class="align-self-center mt-2">Add an Article</h1>
    @include('partials.errors')
    <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" aria-describedby="helpId" value="{{old('title')}}">
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
                <option value="{{$category->id}}" {{$category->id == old('category_id')? 'selected': ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags[]">Tags</label>
            <select multiple class="form-control" name="tags[]" id="tags[]">
                <option value="" disabled>Select a Tag</option>
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            @error('tags[]')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Corpo</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="body" id="body" rows="3">{{old('body')}}</textarea>
            <small id="helpId" class="text-muted">Inserisci il nuovo articolo</small>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image" class="d-block">Copertina</label>
            <small id="helpId" class="text-muted d-block">Carica un'immagine</small>
            <input type="file" name="image" id="image">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" placeholder="Nome e Cognome" aria-describedby="helpId" value="{{old('author')}}">
            <small id="helpId" class="text-muted">Inserisci l'autore dell'articolo</small>
            @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">CREA</button>
    </form>
</div>
@endsection
