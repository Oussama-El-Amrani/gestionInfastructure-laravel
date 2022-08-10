<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'state' => 'required|boolean',
            'date_taken' => 'required',
            'date_delivery' => 'required',
            'comment' => 'required|string|max:160000',
            'user_full_name' => 'required|string|max:200'
        ];
    }
}
