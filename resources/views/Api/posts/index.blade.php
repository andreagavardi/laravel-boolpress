@extends('layouts.app')

@section('content')
<div class="container posts  ">
    <h1 class="text-center text-uppercase">Posts</h1>
    <div class="row">


        <div class="card post">
            <a href="#">
                <img class="card-img-top" src" alt="">
            </a>
            <div class="card-body">
                <h4 class="card-title text-uppercase"></h4>
                <div class="tags">
                    <strong>Tags: </strong>

                    <span class="tag"></span>
                  <span> No Tags Yet</span>

                </div>
                <h5> Category:

                    <a href="#"></a>

                </h5>
                <span>Autore:</span>
                <div class="card-text">
                </div>
                <a href="#">Read More</a>
            </div>
        </div>

    </div>
</div>
@endsection
