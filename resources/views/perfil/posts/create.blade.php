@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.create')
        @slot('title', 'Criar Post')
        @slot('url', route('perfil.posts.store'))
        @slot('form')
            @include('perfil.posts.form')
        @endslot
    @endcomponent
@endsection