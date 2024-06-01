@extends('layouts.app')

@section('content')
<div class="bg-orange vh-100">
    index.blade
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-uppercase text-center">i tuoi allenamenti</h1>
                <a href="{{route('admin.trainings.create')}}"><button class="create-button ">Nuovo Allenamento</button></a>
            </div>
            <div class="col-12 mb-5">
                <div class="card mt-5" style="width: 18rem;">
                    <img src="logo.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        @foreach ($trainings as $training)
                        <h5 class="card-title">{{$training->title}}</h5>
                        @endforeach
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        
                    </div>
                  </div>
            </div>
        </div>
    </div>

</div>



@endsection