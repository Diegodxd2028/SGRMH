<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!--favicon-->
    <!--estilos-->
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- header-->
    @include('layouts.partials.header')
    <!-- Contenido -->
    <main class="py-6 px-4">
        @yield('content')
    </main>

    <!--footer-->
    @include('layouts.partials.footer')
    <!--scripts-->
</body>
</html>
