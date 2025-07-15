@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cita</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Doctor:</label>
        <select name="doctor_id" required>
            <option value="">-- Seleccione Doctor --</option>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}>
                    {{ $doctor->name }}
                </option>
            @endforeach
        </select><br><br>

        <label>Paciente:</label>
        <select name="patient_id" required>
            <option value="">-- Seleccione Paciente --</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>
                    {{ $patient->name }}
                </option>
            @endforeach
        </select><br><br>

        <label>Fecha:</label>
        <input type="date" name="date" value="{{ old('date', $appointment->date) }}" required><br><br>

        <label>Hora:</label>
        <input type="time" name="time" value="{{ old('time', $appointment->time) }}" required><br><br>

        <label>Estado:</label>
        <select name="status" required>
            <option value="pending" {{ old('status', $appointment->status) == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="confirmed" {{ old('status', $appointment->status) == 'confirmed' ? 'selected' : '' }}>Confirmada</option>
            <option value="cancelled" {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
        </select><br><br>

        <button type="submit">💾 Actualizar</button>
    </form>
</div>
@endsection
