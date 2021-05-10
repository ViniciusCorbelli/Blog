@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Comentario')
        @slot('url', route('admin.comments.update', $comment->id))
        @slot('form')
            @include('admin.comments.form')
        @endslot
    @endcomponent
@endsection