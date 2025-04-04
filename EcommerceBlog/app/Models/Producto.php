<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory; 

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'categoria_id', 'imagen' ];
    
    public function categoria() //cada producto pertenece a una sola categoría//
    {
        return $this->belongsTo(Categoria::class);
    }
}
