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
                <li><a href="{{ url('admin/admin_home') }}">Inicio</a></li>
                <li><a href="">Oferta</a></li>
                <li><a href="">Novedades</a></li>
                <li><a href="">Bajan de precio</a></li>
                <li><a href="">Armarios</a></li>
                <li><a href="">Librerias</a></li>
                <li><a href="">Estanterias</a></li>
                <li><a href="">Escritorios</a></li>
                <li><a href="">Comodas</a></li>
                <li><a href="">Mesillas</a></li>
                <li><a href="">Vitrinas</a></li>
                <li><a href="">Mesas de escritorio</a></li>
                <li><a href="">Mesas</a></li>
                <li><a href="">Tocadores</a></li>
                <li><a href="">Sillones</a></li>
                <li><a href="">Sillas</a></li>
                <li><a href="">Sofas</a></li>
                <li><a href="">Camas</a></li>
                <li><a href="">Taburetes</a></li>
                <li><a href="">Tumbonas</a></li>
                <li><a href="">Lamparas</a></li>
            </ul>
        </li>


    </div>
    <div>
        <li>
            <a href="{{ url('admin/admin_home') }}"><img src="/imagenes/logo.png" id="imglogo"  alt="logo de la pagina web"  /></a>
        </li>
    </div>

    <div>



        <input id="searchinput" type="search" placeholder="Buscar:">
    </div>




    <div>

    <!---  <a class="nav-link" href="{{ route('login') }}"><img src="imagenes/iconos/perfil2.png" id="imguser" alt="Icono de usuario" /></a> --->
        @guest

            <ul class="menulogin">
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                </div>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.index') }}">
                                {{ __('Mi perfil') }}
                            </a>

                                <a class="dropdown-item"  href="{{route('producto.create')}}">
                                {{ __('Crear producto') }}
                            </a>


                                <a class="dropdown-item" href="{{url('products/all_products')}}">
                                    {{ __('Ver productos') }}
                                </a>



                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                {{ __('Ver usuarios') }}
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


    <div> <img src="/imagenes/iconos/carrito.png" id="imgcarro" alt="Icono del carrito" /></div>


</div>


<main class="py-4">
    @yield('content')
</main>

</body>
</html>
