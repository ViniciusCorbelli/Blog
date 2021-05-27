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
                    @endphp

                    @for ($i = 0; $i < 12; $i++)
                        @php
                            $month = (date('m') + $i) % 12 + 1;
                            $year = 12 - date('m') + $i >= 2 * (12 - date('m')) ? date('Y') : date('Y') - 1;
                        @endphp
                        <hr>
                        <div class="row">
                            <div class="col-8">
                                <h6> <Strong>
                                        <a href="{{ route('blog.date.view', [$month, $year]) }}">
                                            {{ $months[$month-1] }} de {{ $year }}</a>
                                    </Strong> </h6>
                            </div>
                            <div class="col-4 text-right">
                                @php
                                    if ($month < 10) {
                                        $month = 0 . $month;
                                    }
                                @endphp
                                <p> {{ count(
    App\Post::whereMonth('created_at', $month)->whereYear('created_at', $year)->get(),
) }}
                                    postagens</p>
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
