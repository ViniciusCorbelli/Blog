@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('admin.categories.create'))
            @slot('titulo', 'Categorias')
                @slot('head')
                    <th>Nome</th>
                    <th></th>
                @endslot
                @slot('body')
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="options">
                                @can('update', $category)
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                @endcan
                                @can('delete', $category)
                                    <form method="post" action="{{ route('admin.categories.destroy', $category->id) }}" class="form-delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        @endsection

        @push('scripts')
            <script src="{{ asset('js/components/dataTable.js') }}"></script>
            <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
        @endpush
