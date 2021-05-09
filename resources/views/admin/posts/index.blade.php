@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('posts.create'))
        @slot('titulo', 'Mensagem')
        @slot('head')
            <th>Título</th>
            <th>Postado por</th>
            <th>Data da criação</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->date }}</td>
                    <td class="options">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{ route('posts.destroy', $post->id) }}" class="form-delete">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
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
