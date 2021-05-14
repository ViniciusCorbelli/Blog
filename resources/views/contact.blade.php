@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1> ENVIE UMA MENSAGEM </h1>
            <h3><i class="fas fa-envelope"></i> contato@codejr.com.br | <i class="fab fa-instagram"></i> @codejr</h3>
        </div>
        <form class="form-contact">
            <label for="name" class="required">Nome </label>
            <input type="text" name="name" id="name" autofocus class="form-control" required value="{{ old('name') }}">

            <label for="email" class="required">Email </label>
            <input type="email" name="email" id="email" autofocus class="form-control" required
                value="{{ old('email') }}">

            <label for="phone" class="required">Telefone </label>
            <input type="phone" name="phone" id="phone" autofocus class="form-control" required
                value="{{ old('phone') }}">

            <label for="Assunto" class="required">Assunto </label>
            <input type="text" name="Assunto" id="Assunto" autofocus class="form-control" required
                value="{{ old('Assunto') }}">

            <label for="Menssagem" class="required">Menssagem </label>
            <textarea type="text" name="Assunto" id="Assunto" autofocus class="form-control" required
                value="{{ old('Assunto') }}"> </textarea>

            <button type="submit" class="buttons button-registrar">Enviar</button>
        </form>
        <div class="text-center phone-contact">
            <h1> LIGUE PARA NÓS </h1>
            <h3><i aria-hidden="true" class="fas fa-phone-alt"></i> +55 38 9944-7013</h3>
        </div>
    </div>
@endsection
