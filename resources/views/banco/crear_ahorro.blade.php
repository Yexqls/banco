@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Crear Cuenta de Ahorro</h1>
        <form method="POST" action="{{ route('cuenta.store') }}">
            @csrf
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombres }} {{ $cliente->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="numero_cuenta" class="form-label">Número de cuenta</label>
                <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" required>
            </div>
            <div class="mb-3">
                <label for="fecha_creacion" class="form-label">Fecha de creación</label>
                <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener la fecha y hora actuales en formato local
            var currentDate = new Date().toISOString().slice(0, 16); // Formato YYYY-MM-DDTHH:MM
            document.getElementById('fecha_creacion').value = currentDate;
        });
    </script>
@endsection
