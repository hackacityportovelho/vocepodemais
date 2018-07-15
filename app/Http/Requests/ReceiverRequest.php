<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiverRequest extends FormRequest
{
    public function authorize()
    {
      return true;
    }

    public function rules()
    {
      return [
        'cnpj' => 'required|unique:receivers,cnpj',
        'name' => 'required',
        'email' => 'required|unique:receivers,email|email',
        'password' => 'required|confirmed'
      ];
    }

    public function messages()
    {
      return [
        'cnpj.required' => 'Preencha o CNPJ',
        'name.required' => 'Preencha o nome',
        'email.required' => 'Preencha a senha',
        'email.unique' => 'O e-mail já existe',
        'password.required' => 'Preencha a senha',
        'password.confirmed' => 'Confirmação de senha inválida',
      ];
    }
}
