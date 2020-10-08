<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ModernForniture</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/apphome.css') }}" rel="stylesheet">
</head>
<body>

<div id="menu">
    <div id="iconomenu">

        <li><img src="/imagenes/iconos/menu.png" id="imgmenu" alt="Icono para abrir el menu" />
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('ofertas') }}">Oferta</a></li>
                <li><a href="{{ url('novedades') }}">Novedades</a></li>
                <li><a href="{{ url('armarios') }}">Armarios</a></li>
                <li><a href="{{ url('librerias') }}">Librerias</a></li>
                <li><a href="{{ url('estanterias') }}">Estanterias</a></li>
                <li><a href="{{ url('escritorios') }}">Escritorios</a></li>
                <li><a href="{{ url('comodas') }}">Comodas</a></li>
                <li><a href="{{ url('mesas') }}">Mesas</a></li>
                <li><a href="{{ url('sillones') }}">Sillones</a></li>
                <li><a href="{{ url('sillas') }}">Sillas</a></li>
                <li><a href="{{ url('sofas') }}">Sofas</a></li>
                <li><a href="{{ url('camas') }}">Camas</a></li>
                <li><a href="{{ url('taburetes') }}">Taburetes</a></li>
                <li><a href="{{ url('lamparas') }}">Lamparas</a></li>
            </ul>
        </li>


    </div>
    <div id="logo">
        <li>
            <a href="{{ url('/') }}"><img src="/imagenes/logo.png" id="imglogo"  alt="logo de la pagina web"  /></a>
        </li>
    </div>

    <!--SEARCH FORM --->
    <div id="buscar">
        <form  role="search" action="{{url('search')}}">

            <input type="search" id="searchinput" name='search' placeholder="Buscar" />
            <button type="submit" class="btn btn-default"><img  id="imgbuscar" src="/imagenes/iconos/lupa.png"></button>


        </form>


    </div>



    <div id="login">
    <!---  <a class="nav-link" href="{{ route('login') }}"><img src="imagenes/iconos/perfil2.png" id="imguser" alt="Icono de usuario" /></a> --->
        @guest

            <ul class="menulogin">
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar') }}</a>
                    </li>
                </div>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/imagenes/iconos/perfil2.png" id="imguser" alt="icono user"/> <span class="caret"></span>
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.index') }}">
                                {{ __('Mi perfil') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
            </ul>

        @endguest
    </div>


    <div id="carro"> <a class="nav-link" href="{{ route('product.shoppingCart')}}"><img src="/imagenes/iconos/carrito.png" id="imgcarro" alt="Icono del carrito" /><span id="numcar" >{{\Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalQty:''}}</span></a></div>


</div>


<main class="py-4">
    @yield('content')
</main>

</body>
</html>