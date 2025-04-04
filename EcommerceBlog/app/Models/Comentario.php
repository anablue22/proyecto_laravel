<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory; 

    protected $fillable = ['contenido', 'nombre de usuario', 'email', 'articulo_id', 'fecha_creacion_actualizacion'];

    public function articulo() // Comentario pertenece a un Articulo//
    {
        return $this->belongsTo(Articulo::class); 
    }
}
