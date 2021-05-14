@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.edit')
        @slot('title', 'Editar Comentario')
        @slot('url', route('perfil.comments.update', $comment->id))
        @slot('form')
            @include('perfil.comments.form')
        @endslot
    @endcomponent
@endsection