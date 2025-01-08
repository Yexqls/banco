@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1>Consulta de Saldo</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="cuenta_id" class="form-label">Cuenta</label>
            <select class="form-control" id="cuenta_id" name="cuenta_id" required>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

</div>@endsection
