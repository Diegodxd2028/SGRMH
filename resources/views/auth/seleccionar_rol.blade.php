<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Rol</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <main class="bg-white p-10 rounded-xl shadow-md text-center max-w-md w-full">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">¿Cómo deseas iniciar sesión?</h1>

        <div class="flex flex-col space-y-4">
            <a href="{{ route('login.form.usuario') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
                Ingresar como Usuario
            </a>

            <a href="{{ route('login.form.admin') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
                Ingresar como Administrador
            </a>
        </div>
    </main>

</body>
</html>
