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
            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
        </form>
        {{-- Mostrar mensajes --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
