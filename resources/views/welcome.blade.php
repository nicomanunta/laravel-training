@extends('layouts.style')
@section('content')
<div class="bg-color-black">
    <div class="bg-welcome container ">
        <div class="d-none d-md-block row h-100">
            <div class="  col-12 text-center pt-5 ">
                <img style="width: 30%" src="logo.jpeg" alt="">
                <h1 class="my-5 color-orange ">Crea il tuo piano di allenamento! </h1>
                
            </div>
            <div class="col-12 text-center justify-content-center ">
                <ul class="navbar-nav ml-auto ">
                    <!-- Authentication Links -->
                    @guest 

                    
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none color-white text-uppercase" href="{{ route('login') }}"><span class="login underline">{{ __('Accedi') }}</span></a>
                    </li>
                    
                    @if (Route::has('register'))
                    <li class="nav-item mt-3">
                        <a class="text-decoration-none color-white text-uppercase" href="{{ route('register') }}"><span class="login underline">{{ __('Registrati') }}</span></a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        
                
                        <div class="" aria-labelledby="">
                            <a class="nav-link ingrandire-link" href="{{ url('trainings') }}">{{__('Home')}}</a>
                            <a class="nav-link ingrandire-link" href="{{ url('profile') }}">{{__('Modifica dati profilo')}}</a>
                            <a class="nav-link ingrandire-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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


        {{-- RESPONSIVE --}}
        <div class=" d-md-none row h-100">
            <div class="  col-12 text-center  pt-5">
                <img style="width: 100%" src="logo.jpeg" alt="">
                <h1 class="my-5 color-orange ">Crea il tuo piano di allenamento! </h1>
                
            </div>
            <div class="col-12 text-center justify-content-center ">
                <ul class="navbar-nav ml-auto ">
                    <!-- Authentication Links -->
                    @guest 

                    
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none color-white " href="{{ route('login') }}"><button class="login underline responsive-button text-uppercase">{{ __('Accedi') }}</button></a>
                    </li>
                    
                    @if (Route::has('register'))
                    <li class="nav-item mt-3">
                        <a class="text-decoration-none color-white " href="{{ route('register') }}"><button class="login underline responsive-button text-uppercase">{{ __('Registrati') }}</button></a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        
                
                        <div class="" aria-labelledby="">
                            <a class="nav-link ingrandire-link" href="{{ url('trainings') }}">{{__('Home')}}</a>
                            <a class="nav-link ingrandire-link" href="{{ url('profile') }}">{{__('Modifica dati profilo')}}</a>
                            <a class="nav-link ingrandire-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
</div>

@endsection