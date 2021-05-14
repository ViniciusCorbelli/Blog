@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.edit')
        @slot('title', 'Editar Post')
        @slot('url', route('perfil.posts.update', $post->id))
        @slot('form')
            @include('perfil.posts.form')
        @endslot
    @endcomponent
@endsection