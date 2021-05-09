@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar usuário ' . $user->name)
        @slot('url', route('users.update', $user->id))
        @slot('form')
            @include('admin.users.form')
        @endslot
    @endcomponent
@endsection
