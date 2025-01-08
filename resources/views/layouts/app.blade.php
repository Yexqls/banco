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
        <style>html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Ajusta el valor para que sea adecuado al tamaño del header y footer */
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
    </style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #146ebe;">
        <a class="navbar-brand" href="/banco" style="color: white; padding-left: 10px;">
            <i class="fa-solid fa-house" style="padding-right: 2px;"></i> <b>Banco MX</b>
        </a>
        <a href="/usuario/crear" class="text-white ml-3" style="padding-left: 20px;">Crear cliente</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Banco MX. Todos los derechos reservados.</p>
        <p>Desarrollado por Yucli Emmanuel.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>    

</body>

</html>
