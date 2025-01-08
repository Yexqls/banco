@extends('layouts.app')
@section('content')
<style>
    .container {
    background-color: #ffffff;
    padding: 119px;
    max-width: 1600px;
    margin: 0 auto;
    box-shadow: 0 4px 6px rgba(247, 241, 241, 0.1);
    box-sizing: border-box;
    border-radius: 40px;
}
</style>
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
            <!-- Mostrar saldo -->
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
