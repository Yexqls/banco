@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Crear Cliente</h1>
        <form method="POST" action="{{ route('usuario.store') }}" id="cliente-form">
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
                <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion"
                    maxlength="18">
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres">
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos">
            </div>
            <div class="mb-3">
                <label for="razon_social" class="form-label">Razón Social</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social">
            </div>
            <div class="mb-3">
                <label for="municipio" class="form-label">Municipio</label>
                <input type="text" class="form-control" id="municipio" name="municipio">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //Validaciones 
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                });
            @endif

            $("#cliente-form").submit(function(event) {
                let isValid = true;
                let errorMessage = '';
                let errors = {};

                // Limpiar mensajes previos
                $(".error-message").remove();

                const tipoIdentificacion = $("#tipo_identificacion").val();
                const numeroIdentificacion = $("#numero_identificacion").val();

                // validacion INE o Acta
                if (tipoIdentificacion === "INE" && numeroIdentificacion.length !== 18) {
                    isValid = false;
                    errors['numero_identificacion'] =
                        'El número de identificación del INE debe tener al menos 18 caracteres.';
                } else if (tipoIdentificacion !== "INE" && !/^\d+$/.test(numeroIdentificacion)) {
                    isValid = false;
                    errors['numero_identificacion'] = 'El número de identificación debe ser solo números.';
                }

                // Validación nombre y apellidos
                const nombres = $("#nombres").val();
                if (!/^[a-zA-Z\s]+$/.test(nombres)) {
                    isValid = false;
                    errors['nombres'] = 'Los nombres solo deben contener letras y espacios.';
                }

                const apellidos = $("#apellidos").val();
                if (!/^[a-zA-Z\s]+$/.test(apellidos)) {
                    isValid = false;
                    errors['apellidos'] = 'Los apellidos solo deben contener letras y espacios.';
                }

                // Validación de la razon social
                const razonSocial = $("#razon_social").val();
                if (razonSocial && !/^[a-zA-Z0-9\s]+$/.test(razonSocial)) {
                    isValid = false;
                    errors['razon_social'] =
                        'La razón social solo debe contener letras, números y espacios.';
                }

                const municipio = $("#municipio").val();
                if (!/^[a-zA-Z\s]+$/.test(municipio)) {
                    isValid = false;
                    errors['municipio'] = 'El municipio solo debe contener letras y espacios.';
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
