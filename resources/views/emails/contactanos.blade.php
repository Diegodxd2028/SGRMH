<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactanos</title>
</head>
<body>
    <h1>CORREO ELECTRONICO</h1>
    <p>Este es el primero correo que mandamos por laravel</p>
    <p>Nombre: {{$data['nombre']}}</p>
    <p>Correo: {{$data['email']}}</p>
    <p>Telefono: {{$data['telefono']}}</p>
    <p>Asunto: {{$data['asunto']}}</p>
    <p>Mensaje: {{$data['mensaje']}}</p>
</body>
</html>