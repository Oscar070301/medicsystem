@extends('layouts.app')


@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-8 mt-6">
    <h1 class="text-2xl font-bold text-terracota mb-6">🩺 Nueva Cita</h1>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validaciones --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Doctor --}}
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">👨‍⚕️ Doctor</label>
            <select name="doctor_id" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-terracota">
                <option value="">-- Seleccione Doctor --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Paciente --}}
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">🧑 Paciente</label>
            <select name="patient_id" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-terracota">
                <option value="">-- Seleccione Paciente --</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Fecha --}}
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">📅 Fecha</label>
            <input type="date" name="date" value="{{ old('date') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-terracota">
        </div>

        {{-- Hora --}}
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">⏰ Hora</label>
            <input type="time" name="time" value="{{ old('time') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-terracota">
        </div>

        {{-- Estado --}}
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">📌 Estado</label>
            <select name="status" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-terracota">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        {{-- Botón --}}
        <div class="text-right">
            <button type="submit" class="bg-terracota text-white px-6 py-2 rounded shadow hover:bg-opacity-90 transition">
                💾 Guardar Cita
            </button>
        </div>
    </form>
</div>
@endsection
