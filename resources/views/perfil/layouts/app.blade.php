<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CodeJR | Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>

@include('includes.navbar')

<body class="body-site">
    <div class="container">
        @yield('content')
    </div>
    @include('perfil.includes.success')
    @include('includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var errors = {!! $errors !!}

    </script>
    <script src="{{ asset('js/components/error.js') }}"></script>
    @stack('scripts')
</body>

</html>
