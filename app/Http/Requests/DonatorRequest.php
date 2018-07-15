<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonatorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
        'name' => 'required',
        'email' => 'required|unique:donators,email|email',
        'password' => 'required|confirmed|min:6',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'Preencha com um nome',
        'email.required' => 'Preencha com um email',
        'email.unique' => 'Email já cadastrado',
        'password.required' => 'Preencha a senha',
        'password.confirmed' => 'Senha não confere'
      ];
    }
}
