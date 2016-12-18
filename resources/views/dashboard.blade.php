@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section>
        <div class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h3>what do you have to say</h3></header>
                    <form action="{{ route('post.create') }}" method="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="new-post" cols="30" rows="5" placeholder="Your Post"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
            </div>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda beatae consequatur deleniti dicta distinctio dolores dolorum, eos et eum fuga ipsum magni minima modi natus, omnis, recusandae rerum sint velit!</p>
                <div class="info">
                    Posted by Dan on 12 feb 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>

            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda beatae consequatur deleniti dicta distinctio dolores dolorum, eos et eum fuga ipsum magni minima modi natus, omnis, recusandae rerum sint velit!</p>
                <div class="info">
                    Posted by Dan on 12 feb 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
    
@stop