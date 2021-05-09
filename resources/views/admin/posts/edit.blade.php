@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Post')
        @slot('url', route('posts.update', $post->id))
        @slot('form')
            @include('admin.posts.form')
        @endslot
    @endcomponent
@endsection