<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="{{asset('../resources/css/app.css')}}">
</head>
<body>
    <header>
        <h1>@yield('titulo')</h1>
        <!-- Aquí se incluye el navegador -->
        <nav>
            <ul>
                <li><a href="{{ url('/inicio')}}">Inicio</a></li>
                <li><a href="{{ route('Compra') }}">Compra</a></li>
                <li><a href="{{ route('Venta') }}">Venta</a></li>
                <!-- Agrega más enlaces según tus necesidades -->
            </ul>
        </nav>
    </header>
    
    <div class="container">

        @yield('contenido')
        
    </div>

    <footer>
        <p>Pie de Página &copy; {{ date('Y') }}</p>
        <!-- Puedes agregar información adicional en el pie de página -->
    </footer>

    <!-- Agrega tus scripts comunes aquí -->

</body>
</html>