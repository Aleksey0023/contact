<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'phone' => 'required|string|regex:/(8)[0-9]/|unique:contacts|min:11|max:11',
            'email' => 'required|string|email|unique:contacts|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'name.max' => 'Имя может быть размером максимум в 30 символов',
            'phone.regex' => 'Номер должен начинаться с 8',
            'phone.unique' => 'Контакт с таким номером уже есть в базе',
            'phone.min' => 'Номер должен быть размером в 11 символов',
            'phone.max' => 'Номер должен быть размером в 11 символов',
            'email.unique' => 'Контакт с таким email уже есть в базе',
            'email.max' => 'Email может размером максимум в 30 символов'
        ];
    }
}
