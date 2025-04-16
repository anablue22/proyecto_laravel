<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory; 

    protected $fillable = ['titulo', 'contenido', 'imagen_destacada', 'autor', 'categoria_id', 'fecha_publicacion', 'fecha_creacion_actualizacion'];

   
    public function categoria()
    {
        return $this->belongsTo(CategoriaBlog::class, 'categoria_id');
    }

    // Relación con comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}

