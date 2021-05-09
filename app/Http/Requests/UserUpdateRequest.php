<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email,' . $this->user->id,
            'cpf' => 'required|string|unique:users,cpf,' . $this->user->id,
            'is_admin' => 'nullable',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required_with:password',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'e-mail',
            'cpf' => 'cpf',
            'is_admin' => 'tipo',
            'password' => 'senha',
            'password_confirmation' => 'confirmação de senha',
        ];
    }
}
