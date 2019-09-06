<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css1/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <style>
           

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 450px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
      background-color: black;
      height: auto;
      
            }

            /* Set black background color, white text and some padding */
           

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 0px;
                }
                .row.content {height:auto;} 
            }
        </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="Navbar">
            <div class="container">
           
             @guest
              
              @if (Route::has('home'))
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Home', 'Acceuil') }}
                </a>
                
                @endif
                
                 @else
                  <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('Home', 'Acceuil') }}
                </a>
                
                

                @endguest
               

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se Connecter') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">S' Enrégistrer</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu<span class="caret"></span>
                                </a>
                                
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('renseigner') }}" style='color:Black'
                                       >
                                       j'ai déjà effectué une formation
                                    </a>
                                    <a class="dropdown-item" href="{{ route('liste') }}" style='color:Black'
                                       >
                                       S'inscrire à une formation
                                    </a>
                                    <a class="dropdown-item" href="{{route('Profil')}}" style='color:Black'
                                       >
                                       Consulter son profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('liste2') }}" style='color:Black'
                                       >
                                      Liste des appels d'offres
                                    </a>
                                    <a class="dropdown-item" href="{{route('pratique')}}" style='color:Black'
                                       >
                                       Test de mise à niveau
                                    </a>
                                    <a class="dropdown-item" href="{{route('update')}}" style='color:Black'
                                       >
                                       liste de vos formations 
                                    </a>
                                </div>
                                
                                
                                
                            </li>

                             

                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Mr {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="return window.confirm('voulez-vous déconnecter ?'); event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        {{ __('Deconnexion') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
