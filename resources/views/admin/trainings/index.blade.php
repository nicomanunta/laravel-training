@extends('layouts.app')

@section('content')
<div class="bg-orange vh-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 text-center text-md-start">
                <h1 class="text-uppercase text-center color-white">i tuoi piani di allenamento</h1>
                <a class="" href="{{route('admin.trainings.create')}}"><button class="mt-md-0 mt-3 create-button ">Nuovo Allenamento</button></a>
            </div>
            @foreach ($trainings as $training)
                <div class="col-12 col-md-3 mb-md-5">
                    
                    <div class="card-width card cards bg-color-black mt-5" >
                        <a class=" text-decoration-none" href="{{ route('admin.trainings.show', ['training'=>$training->id])}}">
                            <img src="logo2.jpeg" class="card-img-top" alt="...">
                            <div class="card-body card-training">
                                <h3 class="card-title title-training">{{$training->title}}</h3>
                                <h4 class="card-text text-training mt-3">Durata di
                                    @if ($training->duration_weeks > 1)
                                        {{$training->duration_weeks}} settimane
                                    @else
                                        {{$training->duration_weeks}} settimana
                                    @endif
                                </h4>
                            </div>
                            
                        </a>
                        <div class="text-end m-3">
                            <a class="" href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button "><i class="fa-solid fa-pen"></i></button></a>
                            <button class="ms-1 edit-button " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $training->id }}"><i class="fa-regular fa-trash-can"></i></button>
                            
                        </div>
                        @include('admin.trainings.partials.modal_delete')
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>



@endsection