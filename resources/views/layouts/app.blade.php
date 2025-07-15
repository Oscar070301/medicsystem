<!DOCTYPE html>
<html lang="es">
<head>
   
    <meta charset="UTF-8">
    <title>Mi Proyecto Laravel</title>
</head>
<body>

    <nav>
        <a href="{{ route('doctors.index') }}">Doctores</a> |
        <a href="{{ route('patients.index') }}">Pacientes</a> |
        <a href="{{ route('appointments.index') }}">Citas</a>
    </nav>

    <hr>

    @yield('content')

</body>
</html>