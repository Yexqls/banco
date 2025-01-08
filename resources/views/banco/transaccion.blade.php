@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1>Registrar Transacción</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="cuenta_id" class="form-label">Cuenta</label>
            <select class="form-control" id="cuenta_id" name="cuenta_id" required>

            </select>
        </div>
        <div class="mb-3">
            <label for="tipo_transaccion" class="form-label">Tipo de Transacción</label>
            <select class="form-control" id="tipo_transaccion" name="tipo_transaccion" required>
                <option value="retiro">Retiro</option>
                <option value="consignacion">Consignación</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" class="form-control" id="monto" name="monto" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection
