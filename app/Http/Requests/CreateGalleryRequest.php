<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'images' => 'nullable|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul galeri wajib diisi',
            'title.string' => 'Judul galeri harus berupa string',
            'title.max' => 'Judul galeri tidak boleh lebih dari 255 karakter',
            'images.required' => 'Minimal 1 gambar wajib diupload',
            'images.array' => 'Images harus berupa array',
            'images.*.image' => 'Setiap file harus berupa gambar',
            'images.*.mimes' => 'Ekstensi gambar harus: jpeg, png, jpg, webp',
            'images.*.max' => 'Ukuran gambar maksimal 2MB tiap file',
        ];
    }
}
