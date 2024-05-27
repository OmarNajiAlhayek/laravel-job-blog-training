<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchJobByTitleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'required',
            'context' => 'required|in:all,my_jobs,favorites',
        ];
    }
}
