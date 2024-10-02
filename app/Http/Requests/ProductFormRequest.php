<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'store' => 'required',
            'name' => 'required',
            'description'=>'required|min:20',

        ];
    }

    public function messages(): array{
        return [
            'store.required' => 'Este campo é requirido!',
            'name.required' => 'O nome do produto é obrigatório',
            'description.min' => 'A descrição do produto precisa ter no mínimo 20 caracteres',
            'description.required' => 'O campo de descrição do produto é obrigatório'
        ];
    }
}
