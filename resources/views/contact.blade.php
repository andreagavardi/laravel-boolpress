@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Contact Me</h1>
    <form action="" method="post">

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Name Lastname" aria-describedby="helpName">
            <small id="helpName" class="text-muted">Insert your fullname</small>
        </div>
        <div class="form-group">
            <label for="email">Your Email Address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" aria-describedby="helpEmail">
            <small id="helpEmail" class="text-muted">Insert a valid email</small>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" rows="4" aria-describedby="helpMessage"></textarea>
            <small id="helpMessage" class="text-muted">Type your message here</small>
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
</div>


@endsection
