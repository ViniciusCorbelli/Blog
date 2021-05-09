@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                @for ($i = count($posts) - 1; $i >= 0; $i--)
                    <div class="postagem post-author">
                        <img src="{{ asset('img/' . $posts[$i]->user->image) }}" alt="Foto de perfil">
                        <h5>Postado por {{ $posts[$i]->user->name }} </h5>
                        <h6>{{ $posts[$i]->date }}</h6>
                    </div>
                    <div class="postagem post-title">
                        <h5> {{ $posts[$i]->category->name }} </h5>
                        <h2> {{ $posts[$i]->title }} </h2>
                    </div>
                    <div class="postagem post-main">
                        <p class="limite-rows"> {{ $posts[$i]->message }} </p>
                        <div class="post-continuar">
                            <a href="{{ route('posts.show', $posts[$i]->id) }}"><button type="button"
                                    class="btn btn-primary button-continue">Continue
                                    lendo</button></a>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-4 postagem">
                <a class="twitter-timeline" data-height="600" data-theme="light"
                    href="https://twitter.com/Code_junior">Tweets por Code Empresa Júnior</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
@endsection
