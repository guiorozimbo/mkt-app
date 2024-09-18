<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'description' => ['required','nullable', 'min:20'],
            'whatsapp' => ['required','string','max:255'],
            'phone' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
            'about' => ['required','string','max:255'],
            'logo' => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'lat' => ['required','numeric'],
            'lng' => ['required','numeric'],
        ];
    }
    public function messages(): array{
        return [
            'name.required' => 'O nome da loja é obrigatório.',
            'description.min' => 'Este campo deve ter pelo menos :min caracteres',
            'description.required' => 'A descrição da loja é obrigatória.',
            'whatsapp.required' => 'O número do Whatsapp é obrigatório.',
            'phone.required' => 'O número do telefone é obrigatório.',
            'email.required' => 'O endereço de email é obrigatório.',
            'about.required' => 'O sobre loja é obrigatória.',
            'logo.required' => 'O logo da loja é obrigatório.',
            'logo.image' => 'O logo da loja deve ser uma imagem.',
            'logo.mimes' => 'O logo da loja deve ser um arquivo JPEG, PNG, JPG ou GIF.',
            'logo.max' => 'O logo da loja não pode ultrapassar'];
    }
}
