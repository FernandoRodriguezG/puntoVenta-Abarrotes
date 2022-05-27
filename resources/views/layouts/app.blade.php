<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Abarrotes Anita - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .opMenu{
        color: #B8C7CE;
    }
    .bg{
        background-color:#00A65A;
        color:#F8FFE5;
    }
    a{
        color:#F8FFE5;
    }
    </style>
</head>
<body>
    <!-- ENCABEZADO -->
    <div class="container-fluid" style="background-color:#3A7D44;">
        <div class="row " >
            <div class="col-10">
                <div style="height:70px">
                <div style="height:13px"></div>
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Abarrotes "Anita"
                    </a>
                </div>
            </div>
            <div class="col-2 user">
            <ul class="mr-auto">
            </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="dropdown">
                                
                                <a style="color:#F8FFE5;" id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                   
                                </div>                                
                            </li>
                        @endguest
                    </ul>
            </div>
        </div>
    </div>
    <!-- MENU Y CONTENIDO -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- HTML DE MENU -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color:#222D32;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" >

                    

                    <li class="nav-item ">
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle opMenu">
                        <i class="fas fa-box-open"></i>
                        <span class="ms-1 d-none d-sm-inline">Venta</span>
                        <i class="fas fa-chevron-down"></i>
                        </a>

                        <ul class="collapse nav flex-column ms-1 smenu" id="submenu1" data-bs-parent="#menu">
                    
                            <li>
                            <a href="/verVentas" class="nav-link px-0 opMenu">
                            <i class="fas fa-list"></i>
                                <span class="d-none d-sm-inline">Historial de Ventas </span></a>
                            </li>

                            <li>
                            <a href="/nuevaVenta" class="nav-link px-0 opMenu">
                            <i class="fas fa-plus-square"></i>
                                <span class="d-none d-sm-inline">Nueva Venta </span></a>
                            </li>
                    
                        </ul>
                    </li>
                    
                    <li>
                    <a href="#submenu6" data-bs-toggle="collapse" class="nav-link px-0 align-middle opMenu">
                    <i class="fas fa-cube"></i>
                        <span class="ms-1 d-none d-sm-inline">Productos</span><i class="fas fa-chevron-down"></i></a>
                    <ul class="collapse nav flex-column ms-1 smenu" id="submenu6" data-bs-parent="#menu">
                    
                        <li>
                        <a href="/productos" class="nav-link px-0 opMenu">
                        <i class="fas fa-list"></i>
                            <span class="d-none d-sm-inline">Mostrar productos </span></a>
                        </li>

                        <li>
                        <a href="/nuevoProducto" class="nav-link px-0 opMenu">
                        <i class="fas fa-plus-square"></i>
                            <span class="d-none d-sm-inline">Nuevo Producto </span></a>
                        </li>
                        
                    </ul>
                    </li>
                    
                    <li>
                    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle opMenu">
                    <i class="fas fa-user-alt"></i>
                        <span class="ms-1 d-none d-sm-inline">Usuarios</span><i class="fas fa-chevron-down"></i></a>
                    <ul class="collapse nav flex-column ms-1 smenu" id="submenu4" data-bs-parent="#menu">
                        <li>
                        <a href="/usuarios" class="nav-link px-0 opMenu">
                        <i class="fas fa-list"></i>
                            <span class="d-none d-sm-inline">Mostrar usuarios </span></a>
                        </li>
                        <li>
                        <a href="/nuevousuario" class="nav-link px-0 opMenu">
                        <i class="fas fa-user-plus"></i>
                            <span class="d-none d-sm-inline">Añadir usuario </span></a>
                        </li>
                        
                    </ul>
                    </li>
                    
                    
                </ul>
                <hr />
                </div>
            </div>

            <!-- CONTENIDO A MOSTRAR EN LA PAGINA -->
            <div class="col py-3" style="background-color:#F8FFE5;">
            @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
