<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required',            
            'email' => 'required | unique:users',
            'cpf' => 'required | unique:users',
            'birthday' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatório.',
            'password.required'  => 'O campo senha é de preenchimento obrigatório.',
            'confirmPassword.required'  => 'O campo repita a senha é de preenchimento obrigatório.',
            'email.required'  => 'O campo email é de preenchimento obrigatório.',
            'user_type_id.required'  => 'O campo tipo de usuário é de preenchimento obrigatório.',
            'cpf.required'  => 'O campo CPF é de preenchimento obrigatório.',
            'birthday.required'  => 'O campo data de nascimento é de preenchimento obrigatório.',
            
            'email.unique'  => 'Este email já esta sendo usado.',
            'cpf.unique'  => 'Este CPF já esta sendo usado.',
        ];
    }
}
