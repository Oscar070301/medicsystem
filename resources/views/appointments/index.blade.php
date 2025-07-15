@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Citas</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('appointments.create') }}">➕ Nueva Cita</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->doctor->name ?? 'Sin doctor' }}</td>
                    <td>{{ $appointment->patient->name ?? 'Sin paciente' }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ ucfirst($appointment->status) }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}">✏️ Editar</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
