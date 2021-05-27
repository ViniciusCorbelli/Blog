@extends('layouts.app')

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
                <div class="card-post categories">
                    <h1>Datas</h1>
                    @php
                        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                        $countPost = [count(App\Post::whereMonth('created_at', '01')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '02')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '03')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '04')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '05')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '06')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '07')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '08')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '09')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '10')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '11')->whereYear('created_at', date('Y'))->get()), count(App\Post::whereMonth('created_at', '12')->whereYear('created_at', date('Y'))->get())];
                    @endphp

                    @for ($i = 0; $i < 12; $i++)
                        <hr>
                        <div class="row">
                            <div class="col-8">
                                <h6> <Strong>
                                         <a href="{{ route('blog.date.view', $i+1) }}">
                                        {{ $months[$i] }}</a>
                                    </Strong> </h6>
                            </div>
                            <div class="col-4 text-right">
                                <p> {{ $countPost[$i] }} postagens</p>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-post">
                    <a class="twitter-timeline" data-height="600" data-theme="light"
                        href="https://twitter.com/Code_junior">Tweets por Code Empresa Júnior</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
@endsection
