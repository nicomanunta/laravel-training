<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyTrainingPlanner') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-color-black">
    <div id="app ">


        <nav class="navbar navbar-expand-md navbar-light bg-logo shadow-sm ">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center width-link-logo" href="{{ url('/trainings') }}">
                    <div class="text-start">
                        <img class="logo" src="logo.jpeg" alt="">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="hamburger-button me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class=""><i class="fa-solid fa-bars color-white" style="font-size: 30px"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/trainings') }}"><span class="underline-2 color">{{ __('Home') }}</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><span class="underline-2 color">{{ __('Accedi') }}</span></a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span class="underline-2 color">{{ __('Registrati') }}</span></a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                    
            
                            <div class="" aria-labelledby="">
                                
                                <a class="nav-link d-md-inline" href="{{ url('profile') }}"><span class="underline-2 color">{{ __('Modifica profilo') }}</span></a>
                                <a class="nav-link d-md-inline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="underline-2 color">{{ __('Logout') }}</span>
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

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
