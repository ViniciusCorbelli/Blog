@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.create')
        @slot('title', 'Criar categoria')
        @slot('url', route('perfil.categories.store'))
        @slot('form')
            @include('perfil.categories.form')
        @endslot
    @endcomponent
@endsection