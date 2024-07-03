<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLabelRequest extends FormRequest
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
            'label_name'=> 'required|string|max:200|unique:labels',
            'label_color'=> 'required',
        ];
    }
    public function messages(){
        return[

            'label_name.required'=> "Il nome dell'etichetta è obbligatorio",
            'label_name.string' => "Il nome deve essere un testo",
            'label_name.max' => "Il nome non deve superare i 200 caratteri",
            'label_name.unique' => "Esiste già un'etichetta con questo nome",
            'label_color.required'=> "Seleziona un colore",
        ];
    }
}
