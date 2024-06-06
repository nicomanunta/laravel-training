@extends('layouts.app')

@section('content')
<div class="bg-orange vh-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h1 class="text-uppercase text-center color-white">i tuoi allenamenti</h1>
                <a href="{{route('admin.trainings.create')}}"><button class="create-button ">Nuovo Allenamento</button></a>
            </div>
            @foreach ($trainings as $training)
                <div class="col-3 mb-5">
                    <a href="{{ route('admin.trainings.show', ['training'=>$training->id])}}">

                        <div class="card cards mt-5" style="width: 18rem;">
                            <img src="logo2.jpeg" class="card-img-top" alt="...">
                            <div class="card-body card-training">
                                <h5 class="card-title title-training">{{$training->title}}</h5>
                                <p class="card-text text-training">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="" href="{{route('admin.trainings.edit', ['training'=>$training->id])}}"><button class="edit-button mt-3"><i class="fa-solid fa-pen"></i></button></a>
                                
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>



@endsection