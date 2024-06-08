@extends('layouts.style')

@section('content')
<div class="bg-color-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4 color-orange">Crea un nuovo allenamento</h2>
            </div>
            <div class="col-12">
                <form action="{{route('admin.trainings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                    {{-- CAMPI TABELLA TRAININGS --}}
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="title">Dai un titolo al tuo allenamento</label>
                        <input type="text" class="form-control input-bg" name="title" id="title" placeholder="Allenamento" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="duration_weeks">Quante settimane dura?</label>
                        <input type="number" class="form-control input-bg" name="duration_weeks" id="duration_weeks" placeholder="Durata dell'allenamento" value="{{ old('duration_weeks') }}">
                        @error('duration_weeks')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="color-white mb-2" for="notes">Note</label>
                        <textarea wrap="soft" name="notes" id="notes" class="form-control input-bg">{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- CAMPI TABELLA PROGRAMS --}}

                    <h2 class="mt-5 mb-4 text-center color-orange">Aggiungi i programmi giornalieri</h2>
                    <div id="programs-container">
                        <div class="program">
                            <div class="form-group mb-3">
                                <label class="mb-2 color-white" for="programs[0][week_number]">Numero della settimana</label>
                                <input type="number" name="programs[0][week_number]" class="form-control input-bg" value="{{ old('programs[0][week_number]') }}" placeholder="Numero della settimana" required  >
                                @error('programs[0][week_number]')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="mb-2 color-white" for="programs[0][day_of_week]">Giorno della settimana</label>
                                <select name="programs[0][day_of_week]" class="form-control input-bg" required>
                                    <option value="">Seleziona un giorno</option>
                                    <option value="Lunedì">Lunedì</option>
                                    <option value="Martedì">Martedì</option>
                                    <option value="Mercoledì">Mercoledì</option>
                                    <option value="Giovedì">Giovedì</option>
                                    <option value="Venerdì">Venerdì</option>
                                    <option value="Sabato">Sabato</option>
                                    <option value="Domenica">Domenica</option>
                                </select>
                                @error('programs[0][day_of_week]')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="mb-2 color-white" for="programs[0][subtitle]">Nome del programma giornaliero</label>
                                <input type="text" class="form-control input-bg" name="programs[0][subtitle]" id="programs[0][subtitle]" placeholder="Programma giornaliero" value="{{ old('programs[0][subtitle]') }}">
                                @error('programs[0][subtitle]')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            

                            <div class="form-group mb-5">
                                <label class="mb-2 color-white" for="programs[0][description]">Descrizione</label>
                                <textarea wrap="soft" name="programs[0][description]" class="form-control input-bg">{{ old('programs[0][description]') }}</textarea>
                                @error('programs[0][description]')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group mb-5">
                        <button type="button" id="add-program-button" class="btn aggiungi-button ">Aggiungi Programma</button>
                        <button type="submit" class="btn btn-allenamento ">Salva Allenamento</button>
                    </div>

                </form>
                
            </div>
        </div>
    </div>

</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let programIndex = 1;
        
            document.getElementById('add-program-button').addEventListener('click', function () {
                let programsContainer = document.getElementById('programs-container');
        
                let newProgram = document.createElement('div');
                newProgram.classList.add('program');
                newProgram.innerHTML = `
                
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="programs[${programIndex}][week_number]">Numero della settimana</label>
                        <input type="number" name="programs[${programIndex}][week_number]" class="form-control input-bg" required>
                        @error('programs[${programIndex}][week_number]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="programs[${programIndex}][day_of_week]">Giorno della settimana</label>
                        <select name="programs[${programIndex}][day_of_week]" class="form-control input-bg" required>
                            <option value="">Seleziona un giorno</option>
                            <option value="Lunedì">Lunedì</option>
                            <option value="Martedì">Martedì</option>
                            <option value="Mercoledì">Mercoledì</option>
                            <option value="Giovedì">Giovedì</option>
                            <option value="Venerdì">Venerdì</option>
                            <option value="Sabato">Sabato</option>
                            <option value="Domenica">Domenica</option>
                        </select>
                        @error('programs[${programIndex}][day_of_week]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="programs[${programIndex}][subtitle]">Nome del programma giornaliero</label>
                        <input type="text" class="form-control input-bg" name="programs[${programIndex}][subtitle]" id="programs[${programIndex}][subtitle]" placeholder="Programma giornaliero" value="{{ old('programs[${programIndex}][subtitle]') }}">
                        @error('programs[${programIndex}][subtitle]')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
        
                    <div class="form-group mb-5">
                        <label class="color-white mb-2" for="programs[${programIndex}][description]">Descrizione</label>
                        <textarea wrap="soft" name="programs[${programIndex}][description]" class="form-control input-bg"></textarea>
                        @error('programs[${programIndex}][description]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                `;
        
                programsContainer.appendChild(newProgram);
                programIndex++;
            });
        });
        </script>
@endsection