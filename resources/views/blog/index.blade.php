@extends('blog.layouts.app')

@section('content')
    @php
    $countPost = count($posts) - 1;
    if ($countPost > -1) {
        $min = 0;
        $dest1 = mt_rand(0, $countPost);
        $dest2 = mt_rand(0, $countPost);
        $dest3 = mt_rand(0, $countPost);
        $dest4 = mt_rand(0, $countPost);
        $dest5 = mt_rand(0, $countPost);
    }
    @endphp
    <div class="container">
        @if ($countPost > -1)
            <div class="row">
                <div class="col-lg destaque">
                    <a href="#">
                        <img src="{{ asset('/storage/img/posts/' . $posts[$dest1]->image) }}" alt="Post em destaque">
                        <div class="destaque-text">
                            <h1>{{ $posts[$dest1]->title }}</h1>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <div class="row">
                        <div class="col-sm destaque">
                            <a href="#">
                                <img src="{{ asset('/storage/img/posts/' . $posts[$dest2]->image) }}" alt="Post em destaque">
                                <div class="destaque-text">
                                    <h1>{{ $posts[$dest2]->title }}</h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm destaque">
                            <a href="#">
                                <img src="{{ asset('/storage/img/posts/' . $posts[$dest3]->image) }}" alt="Post em destaque">
                                <div class="destaque-text">
                                    <h1>{{ $posts[$dest3]->title }}</h1>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm destaque">
                            <a href="#">
                                <img src="{{ asset('/storage/img/posts/' . $posts[$dest4]->image) }}" alt="Post em destaque">
                                <div class="destaque-text">
                                    <h1>{{ $posts[$dest4]->title }}</h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm destaque">
                            <a href="#">
                                <img src="{{ asset('/storage/img/posts/' . $posts[$dest5]->image) }}" alt="Post em destaque">
                                <div class="destaque-text">
                                    <h1>{{ $posts[$dest5]->title }}</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-8">
                @if ($countPost > -1)
                    @foreach ($posts as $post)
                        <div class="postagem post-author">
                            <img src="{{ asset('app/public/img/user/' . $post->user->image) }}" alt="Foto de perfil">
                            <h5>Postado por {{ $post->user->name }} </h5>
                            <h6>{{ $post->date }}</h6>
                        </div>
                        <div class="postagem post-title">
                            <h5> {{ $post->category->name }} </h5>
                            <h2> {{ $post->title }} </h2>
                            <h3> {{ $post->subtitle }} </h3>
                        </div>
                        <div class="postagem post-main">
                            <img src="{{ asset('/storage/img/posts/' . $post->image) }}" class="elevation-2">
                            <p> {!! $post->abstract !!} </p>
                            <div class="post-continuar">
                                <a href="{{ route('blog.view', $post->id) }}"><button type="button"
                                        class="btn btn-primary button-continue">Continue
                                        lendo</button></a>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{ $posts->links() }}
            </div>
            <div class="col-sm-4">
                <div class="postagem">
                    <a class="twitter-timeline" data-height="600" data-theme="light"
                        href="https://twitter.com/Code_junior">Tweets por Code Empresa Júnior</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
@endsection
