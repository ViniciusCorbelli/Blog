@extends('blog.layouts.app')

@section('content')
    <div class="container">
        <div class="verticals ten offset-by-one">
            <ol class="breadcrumb breadcrumb-fill2">
                <li><a href="{{ route('site.index') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="active-breadcrumb"> Datas </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="postagem categories">
                    <h1>Datas</h1>
                    @php
                        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                        $countPost = [count(App\Post::whereMonth('created_at', '01')->get()), count(App\Post::whereMonth('created_at', '02')->get()), count(App\Post::whereMonth('created_at', '03')->get()), count(App\Post::whereMonth('created_at', '04')->get()), count(App\Post::whereMonth('created_at', '05')->get()), count(App\Post::whereMonth('created_at', '06')->get()), count(App\Post::whereMonth('created_at', '07')->get()), count(App\Post::whereMonth('created_at', '08')->get()), count(App\Post::whereMonth('created_at', '09')->get()), count(App\Post::whereMonth('created_at', '10')->get()), count(App\Post::whereMonth('created_at', '11')->get()), count(App\Post::whereMonth('created_at', '12')->get())];
                    @endphp

                    @for ($i = 0; $i < 11; $i++)
                        @php
                            $mes = $i+1;
                            if ($mes < 10)
                                $mes = 0 . $mes;
                            $id = App\Post::whereMonth('created_at', $mes)->first();
                        @endphp
                        <hr>
                        <div class="row">
                            <div class="col-10">
                                <h6> <Strong>
                                        @if ($id != null) <a
                                                href="{{ route('blog.date.view', $id->id) }}"> @endif
                                        {{ $months[$i] }}</a>
                                    </Strong> </h6>
                            </div>
                            <div class="col-2 text-center">
                                <p> {{ $countPost[$i] }} postagens</p>
                            </div>
                        </div>
                    @endfor

                </div>
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
