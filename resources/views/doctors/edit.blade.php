@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Doctor</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $doctor->name) }}"><br><br>

        <label>Especialidad:</label>
        <input type="text" name="specialty" value="{{ old('specialty', $doctor->specialty) }}"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $doctor->email) }}"><br><br>

        <label>Teléfono (opcional):</label>
        <input type="text" name="phone" value="{{ old('phone', $doctor->phone) }}"><br><br>

        <button type="submit">💾 Actualizar</button>
    </form>
</div>
@endsection
