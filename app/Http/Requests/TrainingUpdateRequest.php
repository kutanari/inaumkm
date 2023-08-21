<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'batch' => ['nullable', 'max:255', 'string'],
            'details' => ['nullable', 'max:255', 'string'],
            'sylabus' => ['nullable', 'max:255', 'string'],
            'paper' => ['nullable', 'max:255', 'string'],
            'instructor' => ['nullable', 'max:255', 'string'],
        ];
    }
}
