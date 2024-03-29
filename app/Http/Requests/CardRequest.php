<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'pin' => 'required|string|max:100',
            'certificate_expiration_date' => 'required',
            'machine_name' => 'required|string|max:50',
            'password' => 'required|string|max:100',
            'last_access_date' => 'required',
            'update_date' => 'required',
        ];
    }
}
