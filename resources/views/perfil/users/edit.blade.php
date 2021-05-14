@extends('perfil.layouts.app')

@section('content')
    @component('perfil.components.edit')
        @slot('title', 'Editar usuário ' . $user->name)
        @slot('url', route('perfil.users.update', $user->id))
        @slot('form')
            @include('perfil.users.form')
        @endslot
    @endcomponent
@endsection
