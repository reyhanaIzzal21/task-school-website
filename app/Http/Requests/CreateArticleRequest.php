<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'content' => 'required|string|max:65535',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul artikel wajib diisi',
            'title.string' => 'Judul artikel harus berupa string',
            'title.max' => 'Judul artikel tidak boleh lebih dari 255 karakter',
            'content.required' => 'Konten artikel wajib diisi',
            'content.string' => 'Konten artikel harus berupa string',
            'content.max' => 'Konten artikel tidak boleh lebih dari 65535 karakter',
            'thumbnail.required' => 'Thumbnail artikel wajib diisi',
            'thumbnail.image' => 'Thumbnail artikel harus berupa gambar',
            'thumbnail.mimes' => 'Thumbnail artikel harus berupa file dengan ekstensi: jpeg, png, jpg, webp',
            'thumbnail.max' => 'Thumbnail artikel tidak boleh lebih dari 2 mb',
            'category_id.required' => 'Kategori artikel wajib diisi',
            'category_id.exists' => 'Kategori artikel tidak valid',
        ];
    }
}
