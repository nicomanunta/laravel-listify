<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreToDoListRequest extends FormRequest
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
            'title'=> 'required|string|max:200|unique:todolists',
            'subtitle' => 'nullable|string|max:300',
            'tasks.*.description' => 'required|string',
            'priority'=> 'nullable|in:Urgente,Alta,Media,Bassa',
            'expiration_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Il titolo è obbligatorio.',
            'title.string' => 'Il titolo deve essere un testo.',
            'title.max' => 'Il titolo non deve superare i 200 caratteri.',
            'title.unique' => 'Hai già una Todolist con questo titolo.',
            'subtitle.string' => 'Il sottotitolo deve essere un testo.',
            'subtitle.max' => 'Il sottotitolo non deve superare i 300 caratteri.',
            'tasks.*.description.required' => "L'attività è obbligatoria.",
            'tasks.*.description.string' => "L'atticità deve essere un testo.",
            'priority.in' => 'Può essere: Urgente, Alta, Media, Bassa.',
            'expiration_date.date' => 'Deve essere una data.',
        ];
    }
}
