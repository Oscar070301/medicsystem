@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Paciente</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $patient->name) }}"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $patient->email) }}"><br><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="birthdate" value="{{ old('birthdate', $patient->birthdate) }}"><br><br>

        <label>Teléfono (opcional):</label>
        <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}"><br><br>

        <button type="submit">💾 Actualizar</button>
    </form>
</div>
@endsection
