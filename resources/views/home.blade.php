@extends('layouts.app')

@section('content')
    @include('includes.error-handling')
    <section>
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Allo Allo Waz up?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn btn-task">Create </button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </div>
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-3-offset">
            <header><h3>What they say..</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias laudantium minus officia pariatur totam. Aspernatur doloremque eos expedita iusto magnam nesciunt optio possimus qui voluptatum? Consequatur debitis fugiat modi repellendus? </p>
                <div class="info">
                    Posted by BAS on 04.11.2017
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias laudantium minus officia pariatur totam. Aspernatur doloremque eos expedita iusto magnam nesciunt optio possimus qui voluptatum? Consequatur debitis fugiat modi repellendus? </p>
                <div class="info">
                    Posted by BAS on 04.11.2017
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
