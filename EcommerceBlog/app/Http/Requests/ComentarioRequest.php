<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contenido' => 'required',
            'nombre_usuario' => 'required|max:255',
            'email' => 'required|email',
            'articulo_id' => 'required|exists:articulos,id',
        ];
    }
}