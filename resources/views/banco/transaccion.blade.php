@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1>Registrar Transacción</h1>
        <form method="POST" action="{{ route('banco.transaccion.registrar') }}" id="transaccion-form">
            @csrf
            <div class="mb-3">
                <label for="cuenta_id" class="form-label">Cuenta</label>
                <select class="form-control" id="cuenta_id" name="cuenta_id" required>
                    @foreach ($cuentas as $cuenta)
                        <option value="{{ $cuenta->id }}" {{ old('cuenta_id') == $cuenta->id ? 'selected' : '' }}>
                            {{ $cuenta->numero_cuenta }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo_transaccion" class="form-label">Tipo de Transacción</label>
                <select class="form-control" id="tipo_transaccion" name="tipo_transaccion" required>
                    <option value="retiro" {{ old('tipo_transaccion') == 'retiro' ? 'selected' : '' }}>Retiro</option>
                    <option value="consignacion" {{ old('tipo_transaccion') == 'consignacion' ? 'selected' : '' }}>Consignación</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="monto" class="form-label">Monto</label>
                <input type="number" class="form-control" id="monto" name="monto" step="0.01" value="{{ old('monto') }}" >
            </div>
            <div class="mb-3">
                <label for="fecha_creacion" class="form-label">Fecha de creación</label>
                <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

        {{-- Mostrar mensajes --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = { timeZone: 'America/Mexico_City', hour12: false };
            // Obtener la fecha-hora con formato
            const now = new Date().toLocaleString('sv-SE', options).replace(' ', 'T').slice(0, 16);
            document.getElementById('fecha_creacion').value = now;
        });

        $(document).ready(function () {
            $("#transaccion-form").submit(function (event) {
                let isValid = true;
                let errorMessage = '';  
                let errors = {}; 

                // Limpiar mensajes previos
                $(".error-message").remove();

                // Validación sin negativos
                const monto = $("#monto").val();
                if (monto <= 0 || isNaN(monto)) {
                    isValid = false;
                    errors['monto'] = 'El monto debe ser un número positivo.';
                }

                const fechaCreacion = $("#fecha_creacion").val();
                if (!fechaCreacion) {
                    isValid = false;
                    errors['fecha_creacion'] = 'La fecha de creación es obligatoria.';
                }

                const tipoTransaccion = $("#tipo_transaccion").val();
                if (!tipoTransaccion) {
                    isValid = false;
                    errors['tipo_transaccion'] = 'El tipo de transacción es obligatorio.';
                }

                if (!isValid) {
                    event.preventDefault(); 
                    let errorHTML = '';
                    for (const field in errors) {
                        errorHTML += `<p><strong>${field}</strong>: ${errors[field]}</p>`;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        html: errorHTML, 
                        showConfirmButton: true,
                        confirmButtonText: 'Corregir',
                    });
                }
            });
        });
    </script>

@endsection
