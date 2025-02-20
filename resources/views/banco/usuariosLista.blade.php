@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Lista de usuarios</h1>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Razon social</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombres }}</td>
                        <td>{{ $usuario->apellidos }}</td>
                        <td>{{ $usuario->razon_social }}</td>
                        <td>
                            <form action="{{ route('usuarios.eliminar', $usuario->id) }}" method="POST" id="form-eliminar-{{ $usuario->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmarEliminacion({{ $usuario->id }})">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function confirmarEliminacion(usuarioId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esta acción!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-eliminar-' + usuarioId).submit();
                }
            });
        }
    </script>
@endsection
