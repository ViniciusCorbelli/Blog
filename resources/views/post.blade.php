@extends('layouts.index')

@section('content')
    <div class="container">
        <h3> {{ $post->category->name }} </h3>
        <h1> {{ $post->title }} </h1>
        <div class="row post-show">
            <div class="col-3 postagem post-show post-profile">
                <h1>
                    @if ($post->user->access == 'Administrador') <strong> @endif {{ $post->user->name }} </strong>
                </h1>
                <img src={{ asset('img/' . $post->user->image) }} alt="Foto de perfil">
                <h6><strong> Membro desde </strong> {{ $post->user->created_at }}</h6>
                <h6><strong> Tipo de usúario </strong> {{ $post->user->access }}</h6>
                <h6><strong> Postado em </strong> {{ $post->date }}</h6>
            </div>
            <div class="col-8 postagem post-show">
                <p> {{ $post->message }} </p>
            </div>
        </div>
        @foreach ($comments as $comment)
            <div class="row post-show">
                <div class="col-3 postagem post-show post-profile">
                    <h1>
                        @if ($comment->user->access == 'Administrador') <strong>
                        @endif {{ $comment->user->name }} </strong>
                    </h1>
                    <img src={{ asset('img/' . $comment->user->image) }} alt="Foto de perfil">
                    <h6><strong> Membro desde </strong> {{ $comment->user->created_at }}</h6>
                    <h6><strong> Tipo de usúario </strong> {{ $comment->user->access }}</h6>
                    <h6><strong> Postado em </strong> {{ $comment->date }}</h6>
                </div>
                <div class="col-8 postagem post-show">
                    <p> {{ $comment->message }} </p>
                </div>
            </div>
        @endforeach
        @if (Auth::user() != null)
            <div class="row post-show">
                <div class="col-2 postagem post-show post-profile">
                    <img src={{ asset('img/' . $post->user->image) }} alt="Foto de perfil">
                </div>
                <div class="col-9 postagem post-show">
                    <h4>Responder tópico</h4>
                    <form action="{{ route('comment.store', $post->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                        <textarea class="form-control" name="message" id="message" required rows="3"></textarea>
                        <button type="submit" class="btn btn-primary button-responder"> Responder</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection