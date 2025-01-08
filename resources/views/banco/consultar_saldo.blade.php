@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <h1>Consulta de Saldo</h1>
        <form method="POST" action="{{ route('cuenta.consultarSaldo') }}">
            @csrf
            <div class="mb-3">
                <label for="cuenta_id" class="form-label">Cuenta</label>
                <select class="form-control" id="cuenta_id" name="cuenta_id" required>
                    @foreach ($cuentas as $cuenta)
                        <option value="{{ $cuenta->id }}"
                            {{ isset($cuentaSeleccionada) && $cuentaSeleccionada->id == $cuenta->id ? 'selected' : '' }}>
                            {{ $cuenta->numero_cuenta }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- Mostrar saldo --}}
            @isset($saldo)
                <div class="mt-3">
                    <h4>Saldo actual: ${{ number_format($saldo, 2) }}</h4>
                    @isset($ultimaTransaccion)
                        <h5>Última Transacción:</h5>
                        <p>Monto: ${{ number_format($ultimaTransaccion->monto, 2) }}</p>
                        <p>Fecha: {{ $ultimaTransaccion->fecha_transaccion }}</p>
                    @else
                        <p>No hay transacciones registradas.</p>
                    @endisset
                </div>
            @endisset
            <button type="submit" class="btn btn-primary mt-3">Consultar</button>
        </form>
    </div>
@endsection
