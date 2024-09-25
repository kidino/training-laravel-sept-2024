<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'description' => 'required',
            'user_id' => 'required|numeric|exists:users,id'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Nama projek diperlukan',
            'name.min' => 'Projek mesti sekurang-kurangnya 5 huruf',
            'name.max' => 'Nama projek terlalu panjang',
            'description.required' => 'Description diperlukan',
            'user_id.required' => 'Sila pilih project manager',
            'user_id.numeric' => 'Nilai ID project manager tidak sah',
            'user_id.exists' => 'Individu project manager tidak wujud'
        ];
    }
}
