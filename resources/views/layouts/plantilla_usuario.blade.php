<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!--favicon-->
    <!--estilos adicionales de usuario-->
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header de usuario -->
    @include('layouts.partials.header_usuario')

    <!-- Contenido principal -->
    <main class="py-6 px-4">
        @yield('content')
    </main>

    <!-- Footer de usuario -->
    @include('layouts.partials.footer_usuario')

</body>
</html>
