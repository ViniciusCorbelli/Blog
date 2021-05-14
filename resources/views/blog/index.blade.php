@extends('blog.layouts.app')

@section('content')
    @php
    $countPost = count($posts);
    $topPost = App\Post::orderBy('views', 'desc')->get();
    @endphp
    <div class="container">
        <div class="row">
            @if ($countPost > 0)
                <div class="col-sm-4 destaque pl-1 pr-1">
                    <a href="{{ route('blog.view', $topPost[0]->id) }}">
                        <img src="{{ asset('/storage/img/posts/' . $topPost[0]->image) }}" alt="Post em destaque">
                        <div class="destaque-text">
                            <h1>{{ $topPost[0]->title }}</h1>
                        </div>
                    </a>
                </div>
            @endif

            <div class="col-sm-8">
                <div class="row">
                    @for ($i = 1; $i < 5; $i++)
                        @if ($countPost > $i)
                            <div class="col-sm-6 destaque pl-1 pr-1">
                                <a href={{ route('blog.view', $topPost[$i]->id) }}>
                                    <img src="{{ asset('/storage/img/posts/' . $topPost[$i]->image) }}"
                                        alt="Post em destaque">
                                    <div class="destaque-text">
                                        <h1>{{ $topPost[$i]->title }}</h1>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 pl-1 pr-1">
                @if ($countPost > 0)
                    @foreach ($posts as $post)
                        <div class="postagem post-author">
                            <img src="{{ asset('storage/img/user/' . $post->user->image) }}" alt="Foto de perfil">
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
            <div class="col-sm-4 pl-1 pr-1">
                <div class="postagem">
                    <a class="twitter-timeline" data-height="600" data-theme="light"
                        href="https://twitter.com/Code_junior">Tweets por Code Empresa Júnior</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
@endsection
