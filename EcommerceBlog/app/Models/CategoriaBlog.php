<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaBlog extends Model
{
    use HasFactory; 

    protected $table = 'categorias_blogs';

    protected $fillable = ['nombre', 'descripcion'];


}
