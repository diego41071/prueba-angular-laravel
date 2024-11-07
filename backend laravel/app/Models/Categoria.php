<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Categoria extends Model
{
    // Relación inversa de muchos a muchos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'categoria_producto', 'categoria_id', 'producto_id');
    }
        use HasFactory;
    
        // Asegúrate de que el nombre sea asignable
        protected $fillable = ['nombre'];
}
