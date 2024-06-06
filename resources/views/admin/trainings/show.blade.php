@extends('layouts.style')

@section('content')
<div class="pt-4 bg-logo pb-5">
    <div class="container">
        <div class="position-relative">
            <h1 class="text-center color-orange text-uppercase">{{$training->title}}</h1>
            <a class="position-absolute position-top" href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button">Modifica</button></a>

        </div>
        <h2 class="durata text-center color-white text-uppercase">
            durata di
            @if ($training->duration_weeks > 1)
                {{$training->duration_weeks}} settimane
            @else
                {{$training->duration_weeks}} settimana
            @endif
        </h2>
        
        @php
            $currentWeekNumber = null;
        @endphp

        @foreach ($programs as $program)
            @if ($currentWeekNumber !== $program->week_number)
                <div class="row mb-5 mt-5 flex-column"> <!-- Apre una nuova riga per la nuova settimana -->
                    <div class="col-6">

                        <h3 class="color-orange mb-3">Settimana {{$program->week_number}}</h3> <!-- Stampa il numero della settimana -->
                    </div>
                    
                @php
                    $currentWeekNumber = $program->week_number;
                @endphp
            @endif
            <div class="col-6 mt-2 ">
                <div class="card card-day" >
                    <div class="card-body">
                        <h4 class="color-black text-center">{{$program->day_of_week}}</h4>
                        <div class="color-black text-center mt-3">{{$program->description}}</div>
                      <p class="card-text mt-3">800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br> 800 metri al ritmo di una 10km <br></p>
                      
                    </div>
                  </div>
                
            </div>
        @endforeach

        @if ($currentWeekNumber !== null)
            </div> <!-- Chiude l'ultima riga -->
        @endif
    </div>
</div>
@endsection


