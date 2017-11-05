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
            <header><h3>Posts</h3></header>
            @foreach($posts as $post)
                <article class="post">
                    <p>{{ $post -> body }}</p>
                    <div class="info">
                        <p>posted by <strong>{{ $post->user->name }}</strong> on {{ $post->user->created_at }}</p>

                    </div>
                    <div class="interaction">
                        <a href="#">Like</a>|
                        <a href="#">Dislike</a>

                        @if(Auth::user() == $post-> user)
                            |
                            <a href="#" id="post_edit" data-postid="{{ $post->id }}">Edit</a>|
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @endif

                    </div>
                </article>
            @endforeach
        </div>
    </section>
    </div>
    <div id="edit-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Editing the post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
