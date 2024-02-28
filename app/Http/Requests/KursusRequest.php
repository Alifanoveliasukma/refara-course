<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KursusRequest extends FormRequest
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
            'nama_kursus' => 'required| string| max:255',
            'nama_pembuat' => 'required|string|max:255',
            'deskripsi_kursus' => 'required|string',
            'durasi_kursus' => 'nullable|string|max:255',
            'level' => 'required|string',
            'harga_kursus' => 'required|integer|min:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:App\Models\Category,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kursus.required' => 'Silahkan isi nama kursus.',
            'nama_kursus.string' => 'Nama kursus harus berupa teks.',
            'nama_kursus.max' => 'Nama kursus tidak boleh lebih dari 255 karakter.',
            'nama_pembuat.required' => 'Silahkan isi nama pembuat.',
            'nama_pembuat.string' => 'Nama pembuat harus berupa teks.',
            'nama_pembuat.max' => 'Nama pembuat tidak boleh lebih dari 255 karakter.',
            'deskripsi_kursus.required' => 'Silahkan isi deskripsi kursus.',
            'deskripsi_kursus.string' => 'Deskripsi kursus harus berupa teks.',
            'durasi_kursus.string' => 'Durasi kursus harus berupa teks.',
            'durasi_kursus.max' => 'Durasi kursus tidak boleh lebih dari 255 karakter.',
            'level.required' => 'Silahkan pilih level kursus.',
            'level.string' => 'Level kursus harus berupa teks.',
            'harga_kursus.required' => 'Silahkan isi harga kursus.',
            'harga_kursus.integer' => 'Harga kursus harus berupa angka.',
            'harga_kursus.min' => 'Harga kursus tidak boleh kurang dari 0.',
            'image.required' => 'Silahkan isi gambar.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
            'category_id.required' => 'Silahkan pilih kategori.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ];
    }
}
