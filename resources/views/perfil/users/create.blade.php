@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.create')
        @slot('title', 'Criar usuário')
        @slot('url', route('perfil.users.store'))
        @slot('form')
            @include('perfil.users.form')
        @endslot
    @endcomponent
@endsection
