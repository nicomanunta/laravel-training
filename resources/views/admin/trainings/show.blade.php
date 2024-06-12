@extends('layouts.style')

@section('content')



<div class="height-minima pt-4 bg-logo pb-5">
    <div class="container">
        <div class="position-relative">
            <h1 class="text-center color-orange text-uppercase">{{$training->title}}</h1>
            <div class="position-absolute d-none d-md-block position-top">
                <a class="me-4 " href="{{route('admin.trainings.index')}}"><button class="edit-button">Home</button></a>
                <a class=" " href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button">Modifica</button></a>
                <button class="ms-1 edit-button " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $training->id }}">Elimina</button>
                @include('admin.trainings.partials.modal_delete')            
            </div>
            
           
            @php
                $weekNumbers = [];
                foreach ($programs as $program) {
                    if (!in_array($program->week_number, $weekNumbers)) {
                        $weekNumbers[] = $program->week_number;
                    }
                }
                $weekGroups = array_chunk($weekNumbers, 5);
            @endphp
            

           
            

        </div>
        @php
            $currentWeekNumber = null;
        @endphp
        <h2 class="durata text-center color-white text-uppercase">
            durata di
            @if ($training->duration_weeks > 1)
                {{$training->duration_weeks}} settimane
            @else
                {{$training->duration_weeks}} settimana
            @endif
        </h2>

        <div class="d-md-none text-center mt-4">
            <a class="" href="{{route('admin.trainings.index')}}"><button class="edit-button">Home</button></a>
            <a class=" " href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button">Modifica</button></a>
            <button class="ms-1 edit-button " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $training->id }}">Elimina</button>
            @include('admin.trainings.partials.modal_delete')            
        </div>

        <div class="position-right mt-md-0 mt-4">
            <div id="week-buttons-container">
                @foreach ($weekGroups as $index => $weekGroup)
                    <div class="week-group text-md-end text-center " data-group="{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                        @foreach ($weekGroup as $weekNumber)
                            <a class="text-decoration-none" href="#settimana-{{$weekNumber}}">
                                <button class="list-number color-black">
                                    <strong>{{$weekNumber}}</strong>
                                </button>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="d-inline">

                <button class="next-prev prev me-2" id="prev-group" style="display: none;">&lt; </button>
                <button class="next-prev next ms-2" id="next-group" style="display: {{ count($weekGroups) > 1 ? 'inline' : 'none' }};"> &gt;</button>
            </div>
        </div>


        <div class="row">
            @if ($training->notes !== null)
                <div class="text-center text-md-start mt-3 mt-md-0">
                    <button class="hamburger-button " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="color-white">Note <i class="fa-solid fa-caret-down"></i></span>
                    </button>
                    <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
                        <span class="color-white ">{!! nl2br(e($training->notes)) !!}</span>
                    </div>
                </div>
            @endif
            
                @foreach ($programs as $program)
                    @if ($currentWeekNumber !== $program->week_number)
                    @if ($currentWeekNumber !== null)
                        </div> <!-- Chiude la riga precedente se non è la prima iterazione -->
                    @endif
                        <div class="col-md-6 col-12">
                            <div class="row mb-3 mt-5 "> <!-- Apre una nuova riga per la nuova settimana -->
                                <div class="col-12">
                                    <h3 id="settimana-{{$program->week_number}}" class="color-orange mb-3">Settimana {{$program->week_number}}</h3> <!-- Stampa il numero della settimana -->
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
        <div class="text-end mt-5 ">
            
            <a class=" " href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button">Modifica</button></a>
            <button class="ms-1 edit-button " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $training->id }}">Elimina</button>
            @include('admin.trainings.partials.modal_delete')

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentGroup = 0;
        const totalGroups = {{ count($weekGroups) }};
        
        const showGroup = (groupIndex) => {
            document.querySelectorAll('.week-group').forEach((group, index) => {
                group.style.display = index === groupIndex ? 'block' : 'none';
            });
            document.getElementById('prev-group').style.display = groupIndex === 0 ? 'none' : 'inline';
            document.getElementById('next-group').style.display = groupIndex === totalGroups - 1 ? 'none' : 'inline';
        };
    
        document.getElementById('prev-group').addEventListener('click', () => {
            if (currentGroup > 0) {
                currentGroup--;
                showGroup(currentGroup);
            }
        });
    
        document.getElementById('next-group').addEventListener('click', () => {
            if (currentGroup < totalGroups - 1) {
                currentGroup++;
                showGroup(currentGroup);
            }
        });
    
        showGroup(currentGroup);
    });
    </script>
@endsection


