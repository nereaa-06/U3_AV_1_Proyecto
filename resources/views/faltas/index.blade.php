<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Faltas</title>
</head>
<body>
    <h1>Consulta de Faltas </h1>

    <form action="{{ route('faltas.index') }}" method="GET">
        Desde: <input type="date" name="desde">
        Hasta: <input type="date" name="hasta">
        <button type="submit">Filtrar</button>
    </form>
    <br>

    <table border="1">
        <tr>
            <th>Profesor</th>
            <th>Inicio</th>
            <th>Fin</th>
        </tr>
        @foreach($faltas as $falta)
        <tr>
            <td>{{ $falta->profesor->name }}</td>
            <td>{{ $falta->fecha_inicio }}</td>
            <td>{{ $falta->fecha_fin }}</td>
        </tr>
        @endforeach
    </table>

    <br>
    <a href="{{ route('faltas.create') }}">Registrar nueva falta</a> | 
    <a href="{{ route('informes.index') }}">Ir al Informe de Guardia</a>
</body>
</html>