<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\StockBajoMail;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'categoria_id', 'url_imagen'];

    // Relación con categoría (corregido para usar el modelo correcto)
    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_id');
    }

    // Método para verificar stock bajo
    public function checkStockBajo()
    {
        if ($this->stock < 5) {
            // Enviar correo al administrador
            Mail::to('admin@ejemplo.com')->send(new StockBajoMail($this));
        }
    }

    // Este método se ejecuta después de actualizar un modelo
    protected static function booted()
    {
        static::updated(function ($producto) {
            $producto->checkStockBajo();
        });
        
        static::created(function ($producto) {
            $producto->checkStockBajo();
        });
    }
}
