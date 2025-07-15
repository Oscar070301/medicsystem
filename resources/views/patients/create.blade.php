@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Paciente</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="birthdate" value="{{ old('birthdate') }}"><br><br>

        <label>Teléfono (opcional):</label>
        <input type="text" name="phone" value="{{ old('phone') }}"><br><br>

        <button type="submit">💾 Guardar</button>
    </form>
</div>
@endsection
