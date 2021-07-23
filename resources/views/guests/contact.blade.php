@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Me</h1>
    @include('partials.errors')
    @if(session('message'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('message')}}</strong>
    </div>
    @endif
    <form action="{{route('contacts.send')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control @error('full_name') is-invalid @enderror" placeholder="Name Lastname" aria-describedby="helpName" value="{{old('full_name')}}">
            <small id="helpName" class="text-muted">Insert your fullname</small>
            @error('full_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Your Email Address</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com" aria-describedby="helpEmail" value="{{old('email')}}">
            <small id="helpEmail" class="text-muted">Insert a valid email</small>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="4" aria-describedby="helpMessage">{{old('message')}}</textarea>
            <small id="helpMessage" class="text-muted">Type your message here</small>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
</div>


@endsection
