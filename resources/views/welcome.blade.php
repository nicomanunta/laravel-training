@extends('layouts.style')
@section('content')

<div class="bg-image container vh-100">
    <div class="row h-100 position-relative">
        <div class="col-12 text-center mt-5 position-absolute">
            <h1 class="mb-5">Accedi o Registrati per creare il tuo piano di Allenamento</h1>
        </div>
        <div class="col-12 text-center align-content-center h-100">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest 
                <li class="nav-item">
                    <a class="nav-link login" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link login" href="{{ route('register') }}">{{ __('Registrati') }}</a>
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

@endsection