<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Faltas</title>
</head>
<body>
    <h1>Faltas Registradas</h1>

    <a href="{{ route('faltas.create') }}">Registrar nueva falta</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faltas as $falta)
                <tr>
                    {{-- Mostramos el nombre del profesor usando la relación --}}
                    <td>{{ $falta->profesor->name }}</td>
                    <td>{{ $falta->fecha_inicio }}</td>
                    <td>{{ $falta->fecha_fin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>