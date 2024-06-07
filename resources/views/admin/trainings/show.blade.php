@extends('layouts.style')

@section('content')
<div class="height-minima pt-4 bg-logo pb-5">
    <div class="container">
        <div class="position-relative">
            <h1 class="text-center color-orange text-uppercase">{{$training->title}}</h1>
            <div class="position-absolute position-top">
                <a class=" " href="{{route('admin.trainings.index')}}"><button class="edit-button">Home</button></a>
                <a class=" " href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button">Modifica</button></a>
                <button class="ms-1 edit-button " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $training->id }}">Elimina</button>
                @include('admin.trainings.partials.modal_delete')

            </div>

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
        <div class="row">
            
                @foreach ($programs as $program)
                    @if ($currentWeekNumber !== $program->week_number)
                    @if ($currentWeekNumber !== null)
                        </div> <!-- Chiude la riga precedente se non è la prima iterazione -->
                    @endif
                        <div class="col-6">
                            <div class="row mb-3 mt-5 "> <!-- Apre una nuova riga per la nuova settimana -->
                                <div class="col-12">
                                    <h3 class="color-orange mb-3">Settimana {{$program->week_number}}</h3> <!-- Stampa il numero della settimana -->
                                </div>
                            </div>
                            
                        @php
                            $currentWeekNumber = $program->week_number;
                        @endphp
                    @endif
                    <div class="col-12 mt-2 ">
                        <div class="card card-day" >
                            <div class="card-body">
                                <h4 class="color-orange ">{{$program->day_of_week}}</h4>
                                <h5 class="color-black mt-3">{{$program->subtitle}}</h5>
                                <p class="card-text mt-3 font-description">{!! nl2br(e($program->description)) !!}</p>
                            
                            </div>
                        </div>   
                    </div>
                @endforeach
            
        </div>

        @if ($currentWeekNumber !== null)
            </div> <!-- Chiude col-6 -->
        @endif
    </div>
</div>
@endsection


