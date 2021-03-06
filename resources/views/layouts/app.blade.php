<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Buscador libros PDF" />
    <meta name="author" content="Jorge Cujcuj" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/img/favicon.ico') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Agregue -->
    @yield('js')

    <!-- AgregueFavicon
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />-->
    <!-- AgregueFont Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- AgregueGoogle fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- AgregueCore theme CSS (includes Bootstrap)-->
    <link href="{{ asset('web/css/styles.css') }}" rel="stylesheet" />

    <!-- Styles -->
    <style>
        a.active{
            color: red;
            font-weight:bold;
        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- AGREGUE CSS -->
    @yield('css')
</head>
<body data-spy="scroll" data-target=".navbar">

    <div id="app">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link {{request()->routeIs('busquedas.*') ? 'active' : ''}}" href="{{ url('Libros') }}">{{ __('Libros') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">{{ __('Comentarios') }}</a></li>
                        @if(Auth::check())
                        <li class="nav-item"><a class="nav-link {{request()->routeIs('categorias.*') ? 'active' : ''}}" href="{{ url('Categorias') }}">{{ __('Categorias') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{request()->routeIs('autores.*') ? 'active' : ''}}" href="{{ url('Autores') }}">{{ __('Autores') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{request()->routeIs('libros.*') ? 'active' : ''}}" href="{{ url('DBLibros') }}">{{ __('DBLibros') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{request()->routeIs('comentarios.*') ? 'active' : ''}}" href="{{ url('Comentarios') }}">{{ __('Ver Coment.') }}</a></li>
                        @endif

                        @guest
                                @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link {{request()->routeIs('login') ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a></li>
                                @endif

                                @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link {{request()->routeIs('register') ? 'active' : ''}} " href="{{ route('register') }}">{{ __('Registrase') }}</a></li>
                                @endif
                        @else
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right bg-dark text-white" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item bg-dark text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesiono') }}
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
        </nav>
    </div>

     <!-- Masthead-->
     <header class="masthead">
            <div class="container">
                @yield('portada')
            </div>
    </header>

    <!-- Libros Grid-->
    <section class="page-section bg-light text-center">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <!-- Comentario Grid-->
    <section class="page-section" id="contact">
    <div class="container">
        @yield('comentario')
        </div>
    </section>

    <!-- Clients-->
    <footer class="footer py-4" id="Datos">
            <div class="container">
                <div class="text-center">
                    <div class="row align-items-center">
                        <h4 style="font-family: Poppins-Bold; font-size: 29px;">Encu??ntranos</h4>
                        <p>
                            <strong>Direcci??n:</strong>
                            Cant??n Tzanjuy??, Santiago Atitl??n.
                            <br>
                            <strong>Hora:</strong>
                                Lunes a Viernes: 8:00AM - 5:00PM
                        </p>

                        <div class="col-lg-4 text-lg-start">Santiago Atitl??n</div>
                        <div class="col-lg-4 my-3 my-lg-0">
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/MuniAtitlan"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://munisantiagoatitlan.gob.gt/"><i class="fab fa-chrome"></i></a>
                        </div>
                            <div class="col-lg-4 text-lg-end">
                                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- AgregueBootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset( 'web/js/scripts.js') }}" defer></script>
</body>
</html>
