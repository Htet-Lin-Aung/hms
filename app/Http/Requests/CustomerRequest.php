<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'room_id' => 'required',
            'name' => 'required',
            'nrc_region' => 'required',
            'nrc_township' => 'required',
            'nrc_type' => 'required',
            'nrc_no' => 'required',
            'other_nrc' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'address' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'status' => 'nullable',
            'revenue_source' => 'required',
            'images' => 'required|array|max:2',
            'images.*' => 'mimes:jpg,png,jpeg|max:4000'
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => 'The Room name field is required',
            'name.required' => 'The Customer name field is required',
            'images.*.mimes' => 'The file type must be jpg,jpeg or png.'
        ];
    }
}
