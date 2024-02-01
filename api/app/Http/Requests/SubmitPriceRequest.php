<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitPriceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'objecttype' => 'required|string|max:40',
            'orgname' => 'required|string|max:30',
            'town' => 'required|string|max:30',
            'email' => 'required|string|email',
            'fio' => 'required|string',
            'phonenumber' => 'required|string|max:11',
            'technicaltask' => 'required'
        ];
    }
}
