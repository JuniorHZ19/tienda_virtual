<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/extra.css') }}" rel="stylesheet">
    
    
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" >-->

</head>
<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route("home")}}">Inicio </a>
                  </li>

                  @if(Session::get('user')->rol->nombre=="administrador")
                  <li class="nav-item">
                    <a class="nav-link" href="{{route("categorias.index")}}">Categorias</a>
                  </li>
                  @endif

                  <li class="nav-item">
                    <a class="nav-link" href="{{route("productos.index")}}">Productos</a>
                  </li>

                  @if(Session::get('user')->rol->nombre=="administrador")
                  <li class="nav-item">
                    <a class="nav-link" href="{{route("roles.index")}}">Roles</a>
                  </li>
                  @endif
                  @if(Session::get('user')->rol->nombre=="administrador")
                  <li class="nav-item">
                    <a class="nav-link" href="{{route("caracteristicas.index")}}">Caracteristicas</a>
                  </li>
                  @endif

                  <li class="nav-item">
                    <a class="nav-link" href="{{route("clientes.index")}}">Clientes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route("provedores.index")}}">Provedores</a>
                  </li>
                
        
                </ul>
              </div>
              <ul class="navbar-menu">
                <li>Usuario: <strong>{{Session::get('user')->nombre_usuario}}</strong></li>
                <li>Rol: <strong>{{Session::get('user')->rol->nombre}}</strong></li>
              
               </ul>
               <a class="logout-btn" href="{{route('login.logout')}}">Cerrar Sesión</a>
            </div>

            
          </nav>

    <div class="titulo">
        <h1>@yield('titulo')</h1>
        <!-- Aquí se incluye el navegador -->
    </div>    
    </header>
    
    <div class="container">


        @yield('contenido')
        
    </div>


    <footer class="text-center">
        <p>Pie de Página &copy; {{ date('Y') }}</p>
        <!-- Puedes agregar información adicional en el pie de página -->
    </footer>

    
    <!-- Sección para scripts específicos -->
    @yield('scripts')


</body>
</html>