@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('titulo', 'Comentarios')
            @slot('head')
                <th>Autor</th>
                <th>Título da postagem</th>
                <th>Data da criação</th>
                <th></th>
            @endslot
            @slot('body')
                @foreach ($comments as $comment)
                    @can('view', $comment)
                        <tr>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->date }}</td>
                            <td class="options">
                                <a href="{{ route('blog.view', $comment->post_id) }}" class="btn btn-secondary"><i
                                        class="fas fa-eye"></i></i></a>
                                @can('update', $comment)
                                    <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                @endcan
                                @can('delete', $comment)
                                    <form method="post" action="{{ route('admin.comments.destroy', $comment->id) }}" class="form-delete">
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
