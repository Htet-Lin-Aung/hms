<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        $id = $this->route('user');
        return [
            'name' => 'string|required|max:255',
            'email' => 'required','unique:users,email,' . $id,
            'password' =>'nullable|string|min:8|confirmed',
            'roles.*' =>'integer',
            'roles' => 'required|array',
        ];
    }
}
