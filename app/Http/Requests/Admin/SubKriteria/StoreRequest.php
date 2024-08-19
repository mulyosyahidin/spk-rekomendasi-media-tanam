<?php

namespace App\Http\Requests\Admin\SubKriteria;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'operator' => ['nullable', 'in:1,2,3,4,5'],
            'bobot' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_a' => ['nullable'],
            'nilai_b' => ['nullable'],
            'nilai' => ['nullable']
        ];
    }
}
