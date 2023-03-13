<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
            'room_services' => 'required',
            'images' => 'required|array|max:5',
            'images.*' => 'mimes:jpg,png,jpeg|max:4000'
        ];
    }

    public function messages()
    {
        return [
            'images.*.mimes' => 'The file type must be jpg,jpeg or png.'
        ];
    }
}
