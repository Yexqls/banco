@extends('layouts.app')
@section('content')
    <style>
        .cards-container a {
            text-decoration: none;
        }

        .card-1 {
            background-color: rgb(0, 51, 102);
            color: white;
        }

        .card-2 {
            background-color: rgb(0, 51, 102);
            color: white;
        }

        .card-3 {
            background-color: rgb(46, 204, 113);
            color: white;
        }

        .card-4 {
            background-color: rgb(54, 69, 79);
            color: white;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            width: 22rem;
            height: 30rem;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .main-section {
            position: relative;
            overflow: hidden;
        }

        .tarjetas {
            font-size: 250px;
            text-align: center;
            padding: 20px;
            object-fit: cover;
        }

        .container {
            background-color: #ffffff;
            padding: 70px;
            max-width: 1600px;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(247, 241, 241, 0.1);
            box-sizing: border-box;
            border-radius: 40px;
        }
    </style>

    <div class="container mb-5 main-section">
        <h1 class="text-center mb-4" style="color: #146ebe;">Menú Principal</h1>
        <div class="cards-container">
            <a href="/banco/ahorro">
                <div class="card card-1">
                    <i class="fa-solid fa-user tarjetas"></i>
                    <div class="card-body">
                        <h2>Crear Cuenta de Ahorro</h2>
                        <p>Para su cuenta MX</p>
                    </div>
                </div>
            </a>
            <a href="banco/transaccion">
                <div class="card card-3">
                    <i class="fa-solid fa-credit-card tarjetas"></i>
                    <div class="card-body">
                        <h2>Registrar Transacción</h2>
                        <p>De su cuenta MX</p>
                    </div>
                </div>
            </a>
            <a href="banco/consultar">
                <div class="card card-4">
                    <i class="fa-solid fa-money-bill tarjetas"></i>
                    <div class="card-body">
                        <h2>Consultar Saldo</h2>
                        <p>De su cuenta MX</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
