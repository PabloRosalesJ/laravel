<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('add_script')
    @yield('script')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">   
    @yield('add_css')

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item dropdown">
                            <a id="person" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Personas
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="person">
                                <a class="dropdown-item" href="{{ route('buyer.index') }}">
                                    Clientes
                                </a>
                                <a class="dropdown-item" href="{{ route('seller.index') }}">
                                    Vendedores
                                </a>
                                <a class="dropdown-item" href="{{ route('people.index') }}">
                                    Todos
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="products" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Productos
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="products">
                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    Productos
                                </a>
                                <a class="dropdown-item" href="{{ route('categories.index') }}">
                                    Categorias
                                </a>
                                <a class="dropdown-item" href="#">
                                    Almacén
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="credits" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Créditos
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="credits">
                                <a class="dropdown-item" href="{{ route('credit.index') }}">
                                    Listar
                                </a>
                                <a class="dropdown-item" href="#">
                                    Otorgar
                                </a>
                                <a class="dropdown-item" href="{{ route('credit.create') }}">
                                    Añadir
                                </a>
                                <a class="dropdown-item" href="#">
                                    Pago
                                </a>
                            </div>
                        </li>
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container bg-white shadow mt-4">
          <main class="py-4">
            {{-- session message --}}
            @include('includes.session_status')
            {{-- End session message --}}
            @yield('content')
        </main>
        </div> 

    </div>
</body>

</html>
