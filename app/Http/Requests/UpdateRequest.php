<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nama_kursus' => 'required|string|max:255',
            'nama_pembuat' => 'required|string|max:255',
            'deskripsi_kursus' => 'required|string',
            'durasi_kursus' => 'nullable|string|max:255',
            'level' => 'required|string',
            'aksese' => 'required|string',
            'harga_kursus' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:App\Models\Category,id',
        ];
    }
}
