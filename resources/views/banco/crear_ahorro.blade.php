@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Crear Cuenta de Ahorro</h1>
        <form method="POST" action="{{ route('cuenta.store') }}" id="cuenta-form">
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
                <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" >
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#cuenta-form").submit(function (event) {
                let isValid = true;
                let errorMessage = '';  
                let errors = {}; 

                // Limpiar mensajes previos
                $(".error-message").remove();

                const numeroCuenta = $("#numero_cuenta").val();
                if (!/^\d{10,18}$/.test(numeroCuenta)) {
                    isValid = false;
                    errors['numero_cuenta'] = 'El número de cuenta debe ser solo números y tener entre 10 y 18 caracteres.';
                }

                // Validación cliente
                const clienteId = $("#cliente_id").val();
                if (!clienteId) {
                    isValid = false;
                    errors['cliente_id'] = 'El cliente es obligatorio.';
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
