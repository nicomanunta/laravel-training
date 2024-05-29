@extends('layouts.app')

@section('content')
index.blade
<a href="{{route('admin.trainings.create')}}"><button class="create-button ">Aggiungi nuovo progetto</button></a>


@foreach ($trainings as $training)
    {{$training->title}}
@endforeach

@endsection