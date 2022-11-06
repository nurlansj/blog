<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string',
            'role' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'email.required' => 'Это поле необходимо заполнить',
            'email.string' => 'Данные должны соответствовать строчному типу',
            'email.email' => 'Данные должны соответствовать формату email@example.com',
            'email.unique' => 'Пользователь с таким email уже существует',
//            'password.required' => 'Это поле необходимо заполнить',
//            'password.string' => 'Данные должны соответствовать строчному типу',
        ];
    }
}
