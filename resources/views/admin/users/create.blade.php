@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar usuário')
        @slot('url', route('admin.users.store'))
        @slot('form')
            @include('admin.users.form')
        @endslot
    @endcomponent
@endsection
