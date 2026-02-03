<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Guardia</title>
</head>
<body>

    <h1>Profesores Ausentes - Hoy: {{ $hoy }}</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Profesor que falta</th>
                <th>Grupo</th>
                <th>Aula</th>
            </tr>
        </thead>
        <tbody>
            @forelse($huecos as $h)
                <tr>
                    <td>{{ $h->hora_orden }}ª Hora</td>
                    <td>{{ $h->profesor->name }}</td>
                    <td>{{ $h->grupo->nombre }}</td>
                    <td>{{ $h->aula->nombre }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay profesores ausentes registrados para hoy.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <nav>
        <a href="{{ route('faltas.index') }}">Ver Historial de Faltas</a> | 
        <a href="{{ route('faltas.create') }}">Registrar Nueva Falta</a>
    </nav>

</body>
</html>