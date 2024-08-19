<?php

namespace App\Http\Requests\Admin\Kriteria;

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
            'nama' => ['required', 'string', 'max:255'],
            'bobot' => ['required', 'numeric', 'min:0', 'max:100'],
            'jenis' => ['required', 'string', 'in:cost,benefit'],
            'tipe_input' => ['required', 'string', 'in:' . implode(',', \App\Enums\TipeInputKriteria::names())],
        ];
    }
}
