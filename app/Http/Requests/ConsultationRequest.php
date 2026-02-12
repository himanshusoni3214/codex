<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'birth_date' => ['nullable', 'date'],
            'birth_time' => ['nullable', 'string', 'max:20'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'consultation_tier' => ['required', 'string', 'max:100'],
            'focus_area' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'consent' => ['accepted'],
        ];
    }
}
