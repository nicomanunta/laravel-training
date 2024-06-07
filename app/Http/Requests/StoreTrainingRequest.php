<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' =>'required|string|max:255',
            'duration_weeks' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'programs.*.week_number' => 'required|integer|min:1',
            'programs.*.day_of_week' => 'required|string|in:Lunedì,Martedì,Mercoledì,Giovedì,Venerdì,Sabato,Domenica',
            'programs.*.subtitle' => 'nullable|string',
            'programs.*.description' => 'nullable|string',

        ];
    }

    public function messages()
    {
        return[
            'title.required' => "Il titolo dell'allenamento è obbligatorio.",
            'title.string' => "Il titolo deve essere un testo.",
            'title.max' => "Il titolo non può superare i 255 caratteri.",
            'duration_weeks.required' => "La durata in settimane è obbligatoria.",
            'duration_weeks.integer' => "La durata deve essere un numero intero.",
            'duration_weeks.min' => "La durata minima è di 1 settimana.",
            'programs.*.week_number.required' => "Il numero della settimana è obbligatorio per tutti i programmi giornalieri.",
            'programs.*.week_number.integer' => 'Il numero della settimana deve essere un numero intero per tutti i programmi giornalieri.',
            'programs.*.week_number.min' => 'Il numero della settimana deve essere almeno 1 per tutti i programmi giornalieri.',
            'programs.*.day_of_week.required' => 'Il giorno della settimana è obbligatorio per tutti i programmi giornalieri.',
            'programs.*.day_of_week.string' => 'Il giorno della settimana deve essere una stringa per tutti i programmi giornalieri.',
            'programs.*.day_of_week.in' => 'Il giorno della settimana deve essere uno dei seguenti: Lunedì, Martedì, Mercoledì, Giovedì, Venerdì, Sabato, Domenica per tutti i programmi giornalieri.',
            'programs.*.subtitle.string' => 'Il nome del programma deve essere un testo.',
            'programs.*.description.string' => 'La descrizione deve essere un testo.',

            
        ];
    }
}
