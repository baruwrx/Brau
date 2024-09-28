<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Datos</title>
</head>
<body>
    <h1>Formulario de Inserción de Datos</h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" required>

        <button type="submit">Enviar</button>
    </form>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>
