@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar categoria ' . $category->name)
        @slot('url', route('admin.categories.update', $category->id))
        @slot('form')
            @include('admin.categories.form')
        @endslot
    @endcomponent
@endsection