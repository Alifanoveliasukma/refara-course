<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_category.required' => 'Silahkan isi nama kategori.',
            'nama_category.string' => 'Nama kategori harus berupa teks.',
            'nama_category.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'image.required' => 'Silahkan isi gambar.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
        ];
    }
}
