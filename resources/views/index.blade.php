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

    <h1>Informe de Guardia - Hoy: {{ $hoy }}</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Profesor Ausente</th>
            <th>Grupo</th>
            <th>Aula</th>
        </tr>
    </thead>
    <tbody>
        @foreach($huecos as $h)
            <tr>
                <td>{{ $h->hora_orden }}ª</td>
                <td>{{ $h->profesor->name }}</td>
                <td>{{ $h->grupo->nombre }}</td>
                <td>{{ $h->aula->nombre }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<a href="{{ route('faltas.index') }}">Ver historial de faltas</a>
</body>
</html>