<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contáctanos</title>
</head>
<body>
    <h1>CORREO ELECTRÓNICO</h1>
    <p>Este es el primer correo que enviamos desde Laravel</p>

    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Correo:</strong> {{ $user->email }}</p>
    <p><strong>Teléfono:</strong> {{ $user->telefono }}</p>

    <p><strong>Asunto:</strong> {{ $data['asunto'] }}</p>
    <p><strong>Mensaje:</strong> {{ $data['mensaje'] }}</p>
</body>
</html>
