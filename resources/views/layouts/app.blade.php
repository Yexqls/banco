<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banco</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <style>body {
            height: 100%;
            margin: 0;
        }

        /* Ajusta el valor del footer y header*/
        .container {
            min-height: calc(80vh - 120px);
            padding-bottom: 60px;
        }

        footer {
            background-color: #146ebe;
            padding: 30px 0;
            text-align: center;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
        }

        /*ESTILO LINEA*/
        .hover-linea {
            display: inline-block;
            position: relative;
            text-decoration: none;
            cursor: pointer;
        }

        .hover-linea::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: #ffffff;
            transition: width 0.3s ease;
        }

        .hover-linea:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #146ebe;">
        <a class="navbar-brand" href="/banco" style="color: white; padding: 10px">
            <i class="fa-solid fa-house"></i> <b>Banco MX</b>
        </a>
        <a class="hover-linea" href="/usuario/crear" style="text-decoration: none;color:white"> <i
                class="fa-solid fa-user-plus"></i>
            Crear cliente</a>
        <a class="hover-linea" href="/usuarios" style="text-decoration: none; margin-left:16px; color:white"> <i
                class="fa-solid fa-list"></i>
            Lista de clientes</a>

    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Banco MX. Todos los derechos reservados.</p>
        <p>Desarrollado por Yucli Emmanuel Baza Ortuño para EMKODE.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
