@extends('layouts.style')
@section('content')

<div class="pt-4 bg-logo vh-100">
    <div class="container">
        <h1 class="text-center color-text text-uppercase">{{$training->title}}</h1>
        <h2 class="durata text-center color-text text-uppercase">
            @if ($training->duration_weeks = 1)
                {{$training->duration_weeks}} settimana
            @else
                {{$training->duration_weeks}} settimane
            @endif
        </h2>
        <div class="row">
            <div class="col-6">
                
            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
</div>

@endsection