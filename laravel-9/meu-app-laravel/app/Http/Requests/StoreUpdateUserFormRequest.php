<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|max:50|min:3',
            'email' => [
                'required',
                'email',
                'unique:users,email,{$id},id',
            ],
            'password' => [
                'required',
                'min:4',
                'max:12'
            ],
            'image' => [
                'file',
                // 'mimes:jpeg,jpg,csv'
            ]
        ];

        if($this->method('PUT')) {
            $rules['password'] = [
                'nullable',
                'min:4',
                'max:12'
            ];
        }

        return $rules;
    }
}

// php artisan make:request StoreUpdateUserFormRequest

// php artisan migrate

// php artisan make:migration add_field_image_to_users_table

// php artisan storage:link