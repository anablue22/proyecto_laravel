<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|max:255',
            'contenido' => 'required',
            'imagen_destacada' => 'nullable|image|max:2048',
            'autor' => 'required|max:255',
            'categoria_id' => 'required|exists:categoria_blogs,id',
            'fecha_publicacion' => 'required|date',
        ];
    }
}