@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.edit')
        @slot('title', 'Editar categoria ' . $category->name)
        @slot('url', route('perfil.categories.update', $category->id))
        @slot('form')
            @include('perfil.categories.form')
        @endslot
    @endcomponent
@endsection