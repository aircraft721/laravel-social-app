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
            @foreach($posts as $post)

                <article class="post">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} - {{ $post->created_at->diffForHumans() }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> |
                        @if(Auth::user() == $post->user)
                            <a href="#" id="post-edit" data-postid="{{ $post->id }}">Edit</a> |
                            <a href="{{ route('post.delete', ['post_id'=>$post->id]) }}">Delete</a>

                        @endif

                    </div>
                </article>

            @endforeach



        </div>
    </section>
    
@stop