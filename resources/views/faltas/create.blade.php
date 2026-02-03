<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Falta</title>
</head>
<body>
    <h1>Registrar Nueva Falta</h1>

    <form action="{{ route('faltas.store') }}" method="POST">
        @csrf
        <label>Profesor:</label>
        <select name="user_id" required>
            <option value="">Selecciona un profesor</option>
            @foreach($profesores as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
        <br><br>
        <label>Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" required>
        <br><br>
        <label>Fecha Fin:</label>
        <input type="date" name="fecha_fin" required>
        <br><br>
        <button type="submit">Guardar Registro</button>
    </form>

    <br>
    <a href="{{ route('faltas.index') }}">Volver al listado</a>
</body>
</html>