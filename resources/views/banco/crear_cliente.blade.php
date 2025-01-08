@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1>Crear Cliente</h1>
    <form method="POST" action="{{ route('usuario.store') }}">
        @csrf
        <div class="mb-3">
            <label for="tipo_identificacion" class="form-label">Tipo de Identificación</label>
            <select class="form-control" id="tipo_identificacion" name="tipo_identificacion">
                <option value="INE">INE</option>
                <option value="Acta Constitutiva">Acta Constitutiva</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="numero_identificacion" class="form-label">Número de Identificación</label>
            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion" required>
        </div>
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="mb-3">
            <label for="razon_social" class="form-label">Razón Social</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social">
        </div>
        <div class="mb-3">
            <label for="municipio" class="form-label">Municipio</label>
            <input type="text" class="form-control" id="municipio" name="municipio" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>  
    @endif
</div>
@endsection
