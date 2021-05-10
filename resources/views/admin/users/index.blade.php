@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('admin.users.create'))
            @slot('titulo', 'Usuários')
                @slot('head')
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th></th>
                @endslot
                @slot('body')
                    @foreach ($users as $user)
                        @can('view', $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->access }}</td>

                                <td class="options">

                                    @can('update', $user)
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary"><i
                                                class="fas fa-edit"></i></a>
                                    @endcan
                                    @can('delete', $user)
                                        <form method="post" action="{{ route('admin.users.destroy', $user->id) }}" class="form-delete">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endcan
                    @endforeach
                @endslot
            @endcomponent
        @endsection

        @push('scripts')
            <script src="{{ asset('js/components/dataTable.js') }}"></script>
            <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
        @endpush
