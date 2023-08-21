<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberOfEmployeeUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'label' => ['required', 'max:255', 'string'],
            'min' => ['required', 'max:255'],
            'max' => ['required', 'max:255'],
        ];
    }
}
