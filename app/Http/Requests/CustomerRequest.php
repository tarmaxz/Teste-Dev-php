<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
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
            'name_full' => ['required'],
            //'email' => ['required', 'email', 'max:80'],
            //'cpf' => ['required', 'string', 'size:11'],
            //'phone' => ['required', 'string', 'max:80']
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
            /*'email.required' => 'O e-mail do responsável é obrigatório.',
            'email.email' => 'O e-mail do responsável deve ser válido.',
            'cpf.required' => 'O CPF do responsável é obrigatório.',
            'cpf.size' => 'O CPF do responsável deve ter exatamente 11 dígitos.',
            'phone.required' => 'O TELEFONE do responsável é obrigatório.',*/
        ];
    }
}
