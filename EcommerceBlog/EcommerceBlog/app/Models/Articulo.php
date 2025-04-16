<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory; 

    protected $fillable = ['titulo', 'contenido', 'imagen_destacada', 'autor', 'categoria_id', 'fecha_publicacion', 'fecha_creacion_actualizacion'];

    public function Articulo(){

        return $this->belongsTo(Categoria::class); 
    }
}
