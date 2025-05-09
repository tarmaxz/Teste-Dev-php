<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
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
        $rules = [
            'name_full' => 'required',
            'cpf' => 'required|cpf',
            'email' => 'required|email',
            'zip_code' => 'required|numeric'
        ];

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name_full.required' => 'O nome completo é obrigatório.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.cpf' => 'O CPF informado é inválido, Use o padrão 999.999.999-99',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'email.unique' => 'O e-mail informado já está cadastrado.',
            'zip_code.required' => 'O CEP é obrigatório.',
            'zip_code.numeric' => 'O CEP deve conter apenas números.',
        ];
    }    
}
