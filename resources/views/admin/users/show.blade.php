@extends('admin.layouts.app')

@section('title', 'Informações do Usuário')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/' . $user->image) }}"
                            alt="Foto de perfil">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>E-mail</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                    </ul>
                    @can('update', $user)
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block mb-2"><i
                                class="fas fa-pen"></i> Editar</a>
                    @endcan
                    @can('delete', $user)
                        <form class="form-delete" action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Excluir</button>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Informações</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Data de Nascimento</strong>
                        <p class="text-muted">
                            {{ date('d/m/Y', strtotime($user->born_date)) }}
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#schedule" data-toggle="tab">Posts
                                    recentes</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <hr>
                                        <h1>Últimos posts</h1>
                                    </div>
                                    <div class="timeline">
                                        @for ($i = count($posts) - 1; $i >= 0; $i--)
                                            <div class="time-label">
                                                <span
                                                    class="bg-green">{{ date('d/m/Y', strtotime($posts[$i]->date)) }}</span>
                                            </div>
                                            <div>
                                                <i class="fas fa-mail-bulk bg-dark"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i>
                                                        {{ date('H:i', strtotime($posts[$i]->date)) }}</span>
                                                    <h3 class="timeline-header"><a
                                                            href="">{{ $posts[$i]->title }}</a>
                                                    </h3>
                                                    <div class="timeline-body"> {{ $posts[$i]->message }}</div>
                                                    <div class="timeline-footer">
                                                        <a href="{{ route('posts.show', $posts[$i]->id) }}" class="btn btn-primary btn-sm">Ler mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                        <div>
                                            <i class="fas fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @push('scripts')
        <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
    @endpush
