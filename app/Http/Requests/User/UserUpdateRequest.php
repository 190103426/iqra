<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = auth()->user();
        $rules =  [
            'full_name' => 'required|min:3|string',
        ];
        if ($this->input('phone')) {
            $rules['phone'] = 'min:18|max:18|string';
        }
        $rules['email'] = 'required|string|email|unique:users,email,'.$user->id;
        return $rules;
    }
}
