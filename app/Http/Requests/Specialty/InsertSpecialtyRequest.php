<?php

namespace App\Http\Requests\Specialty;

use Illuminate\Foundation\Http\FormRequest;

class InsertSpecialtyRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'Titulo é obrigatório',
            'content.required' => 'Conteudo é obrigatório',
            'image.required' => 'Imagem é obrigatório',
        ];
    }
}
