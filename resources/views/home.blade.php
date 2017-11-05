@extends('layouts.app')

@section('content')
    <div class="container container-posts">
    <section>
        <div class="col-md-12">
            <header><h3>Allo Allo Waz up?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn btn-task">Add new Post</button>
                    @include('includes.error-handling')
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </div>
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-12">
            <header><h3>What they say..</h3></header>
            @foreach($posts as $post)
                <article class="post">
                    <p>{{ $post -> body }}</p>
                    <div class="info">
                        <p>posted by <strong>{{ $post->user->name }}</strong> on {{ $post->user->created_at }}</p>

                    </div>
                    <div class="interaction">
                        <a href="#">Like</a>
                        <a href="#">Dislike</a>
                        <a href="#">Edit</a>
                        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    </div>


    {{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                --}}
{{--<div class="panel-heading">Profil</div>--}}{{--


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <p>Allo Allo {{ Auth::user()->name }} wat'z up? :)</p>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
