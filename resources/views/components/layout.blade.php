<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/ap..js'])
    <title>Nova</title>
</head>

<body>
    <x-navbar />

    @if (session()->has('nova_impersonated_by'))
        <div class="alert alert-info m-0">Al momento stai impersonando l'utente {{ Auth::user()->name }} - <a
                href="{{ route('stopImpersonating') }}">Termina Impersonator</a></div>
    @endif
    {{ $slot }}
    <x-footer />
</body>

</html>
