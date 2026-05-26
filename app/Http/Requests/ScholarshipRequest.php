<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScholarshipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'slots' => ['required', 'integer', 'min:1'],
            'deadline' => ['required', 'date', 'after:now'],
            'eligibility_criteria.locations' => ['nullable', 'string'],
            'eligibility_criteria.courses' => ['nullable', 'string'],
            'eligibility_criteria.year_levels' => ['nullable', 'array'],
            'eligibility_criteria.year_levels.*' => ['string'],
            'eligibility_criteria.income_brackets' => ['nullable', 'string'],
            'eligibility_criteria.min_gpa' => ['nullable', 'numeric', 'between:0,4'],
        ];
    }
}
