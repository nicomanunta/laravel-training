@extends('layouts.style')

@section('content')
<div class="bg-color-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4 color-orange">Modifica il tuo allenamento</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.trainings.update', ['training' => $training->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    {{-- CAMPI TABELLA TRAININGS --}}
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="title">Dai un titolo al tuo allenamento</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Allenamento" value="{{ old('title', $training->title) }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="duration_weeks">Quante settimane dura?</label>
                        <input type="number" class="form-control" name="duration_weeks" id="duration_weeks" placeholder="Numero delle settimane" value="{{ old('duration_weeks', $training->duration_weeks) }}">
                        @error('duration_weeks')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="color-white mb-2" for="notes">Note</label>
                        <textarea wrap="soft" name="notes" id="notes" class="form-control">{{ old('notes', $training->notes) }}</textarea>
                        @error('notes')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- CAMPI TABELLA PROGRAMS --}}
                    <h2 class="mt-5 mb-4 text-center color-orange">Modifica i programmi giornalieri</h2>
                    <div id="programs-container">
                        @foreach ($training->programs as $index => $program)
                            <div class="program">
                                <div class="form-group mb-3">
                                    <label class="color-white mb-2" for="programs[{{ $index }}][week_number]">Numero della settimana</label>
                                    <input type="number" name="programs[{{ $index }}][week_number]" class="form-control" value="{{ old('programs.' . $index . '.week_number', $program->week_number) }}" required>
                                    @error('programs.' . $index . '.week_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="color-white mb-2" for="programs[{{ $index }}][day_of_week]">Giorno della settimana</label>
                                    <select name="programs[{{ $index }}][day_of_week]" class="form-control" required>
                                        <option value="">Seleziona un giorno</option>
                                        @foreach (['Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato', 'Domenica'] as $day)
                                            <option value="{{ $day }}" {{ old('programs.' . $index . '.day_of_week', $program->day_of_week) == $day ? 'selected' : '' }}>{{ $day }}</option>
                                        @endforeach
                                    </select>
                                    @error('programs.' . $index . '.day_of_week')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="color-white mb-2" for="programs[{{ $index }}][subtitle]">Nome del programma giornaliero</label>
                                    <input type="text" class="form-control" name="programs[{{ $index }}][subtitle]" id="programs[{{ $index }}][subtitle]" placeholder="Programma giornaliero" value="{{  old('programs.' . $index . '.subtitle', $program->subtitle) }}">
                                    @error('programs.' . $index . '.subtitle')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-5">
                                    <label class="color-white mb-2" for="programs[{{ $index }}][description]">Descrizione</label>
                                    <textarea wrap="soft" name="programs[{{ $index }}][description]" class="form-control">{{ old('programs.' . $index . '.description', $program->description) }}</textarea>
                                    @error('programs.' . $index . '.description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="form-group mb-5">
                        <button type="button" id="add-program-button" class="btn edit-button ">Aggiungi Programma</button>
                        <button type="submit" class="btn btn-allenamento ">Salva Allenamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let programIndex = {{ $training->programs->count() }};
        
            document.getElementById('add-program-button').addEventListener('click', function () {
                let programsContainer = document.getElementById('programs-container');
        
                let newProgram = document.createElement('div');
                newProgram.classList.add('program');
                newProgram.innerHTML = `
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="programs[${programIndex}][week_number]">Numero della settimana</label>
                        <input type="number" name="programs[${programIndex}][week_number]" class="form-control" required>
                        @error('programs[${programIndex}][week_number]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-3">
                        <label class="color-white mb-2" for="programs[${programIndex}][day_of_week]">Giorno della settimana</label>
                        <select name="programs[${programIndex}][day_of_week]" class="form-control" required>
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
                        <input type="text" class="form-control" name="programs[${programIndex}][subtitle]" id="programs[${programIndex}][subtitle]" placeholder="Programma giornaliero" value="{{ old('programs[${programIndex}][subtitle]') }}">
                        @error('programs[${programIndex}][subtitle]')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
        
                    <div class="form-group mb-5">
                        <label class="color-white mb-2" for="programs[${programIndex}][description]">Descrizione</label>
                        <textarea wrap="soft" name="programs[${programIndex}][description]" class="form-control"></textarea>
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
