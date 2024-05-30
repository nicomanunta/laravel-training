@extends('layouts.style')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4">Aggiungi un nuovo allenamento</h2>
            </div>
            <div class="col-12">
                <form action="{{route('admin.trainings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group mb-3">
                        <label for="title">Dai un titolo al tuo allenamento</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Allenamento">
                        @error('title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="duration_weeks">Quante settimane dura?</label>
                        <input type="number" class="form-control" name="duration_weeks" id="duration_weeks" placeholder="Numero delle settimane">
                        @error('duration_weeks')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="date">Data</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="Date">
                        @error('date')
                            <div class="text-danger">{{$message}}</div> 
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="cover_img">Immagine copertina</label>
                        <input type="file" class="form-control" name="cover_img" id="cover_img" placeholder="">
                        @error('cover_img')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Immagini di Galleria</label>
                        <input type="file" class="form-control" name="gallery_img[]" id="cover_img" placeholder="" multiple>
                        @error('cover_img')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="github_url">Link GitHub</label>
                        <input type="text" class="form-control" name="github_url" id="github_url" placeholder="Link GitHub">
                        @error('github_url')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div> --}}
                    {{-- tecnologie --}}
                    <div class="form-group mb-3">
                        <label class="control-label">Tecnologia</label>
                        <div>
                            {{-- @foreach ($technologies as $technology)
                                <div class="form-check-inline">
                                    <input type="checkbox" name="technologies[]" id="technology-{{$technology->id}}" class="form-check-input" value="{{$technology->id}}" @checked(is_array(old('technologies')) && in_array($technology->id, old('technologies')))>
                                    <label class="form-check-label">{{$technology->name}}</label>                                   
                                </div>
                            @endforeach --}}
                        </div>
                        {{-- @error('type_id')
                            <div class="text-danger">{{$message}}</div> 
                        @enderror --}}
                    </div>

                    
                    
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-secondary">Salva</button>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
@endsection